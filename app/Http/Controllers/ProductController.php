<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public  $categories = [
        1 => 'Antiques and Collectibles',
        2 => 'Automobiles and Vehicles',
        3 => 'Jewelry and Watches',
        4 => 'Art and Fine Art',
        5 => 'Electronics and Gadgets',
        6 => 'Fashion and Accessories',
        7 => 'Home and Garden',
        8 => 'Sports and Fitness',
        9 => 'Toys and Hobbies',
        10 => 'Books and Collectible Literature',
        11 => 'Coins and Currency',
        12 => 'Wine and Spirits',
        13 => 'Agricultural and Farming Equipment',
        14 => 'Real Estate and Property',
        15 => 'Musical Instruments',
        16 => 'Business and Industrial Equipment',
        17 => 'Entertainment Memorabilia',
        18 => 'Health and Wellness',
        19 => 'Technology and Innovation',
        20 => 'Charity and Fundraising',
    ];
    

    public function store(Request $request)
    {
        $sessionUserId = Session::get('user_id');
     //   dd($request->all());
        $validator = Validator::make($request->all(),[
            'startingBidPrice' => 'required',
            'reservePrice' => 'required',
            'bidIncrement' => 'required',
            'category' => 'required',
            'startingDate' => 'required',
            'startingTime' => 'required',
            'endingDate' => 'required', 
            'endingTime' => 'required',
            'productName' => 'required',
            'productDescription' => 'required',
            'image1' => 'required|image|max:2048',
            'image2' => 'required|image|max:2048',
            'image3' => 'required|image|max:2048',
            'additionalTerms' => 'nullable',
        ]);

        
        if ($validator->fails()) {
            $validationErrors = implode(', ', $validator->errors()->all());
            $errorMessage = 'Please fix the following errors: ' . $validationErrors;
            return redirect()->back()->with('error', $errorMessage);
        }

        
        // Store data in database
        $startDateTime = $request->startingDate . ' ' . $request->startingTime; 
        $endDateTime = $request->endingDate . ' ' . $request->endingTime;

        $startDateTime = new \DateTime($startDateTime);
        $endDateTime = new \DateTime($endDateTime);

        $product = new Product;
        $product->name = $request->productName;
        $product->description = $request->productDescription;
        $product->category = $request->category; 
        $product->additional_terms = $request->additionalTerms;
        $product->starting_bid_price = $request->startingBidPrice;
        $product->reserve_price = $request->reservePrice;
        $product->bid_increment = $request->bidIncrement;
        $product->BidStartTime = $startDateTime;
        $product->BidEndTime = $endDateTime;
        $product->SellerID =  $sessionUserId;
        
        $product->save();
        
        // Store images

        $image1 = $request->file('image1');
        $image1Name = time().'_1.'.$image1->extension();  
        $image1->storeAs('public/products', $image1Name);

        $image2 = $request->file('image2');
        $image2Name = time().'_2.'.$image2->extension();
        $image2->storeAs('public/products', $image2Name);

        $image3 = $request->file('image3');    
        $image3Name = time().'_3.'.$image3->extension();
        $image3->storeAs('public/products', $image3Name);

        // Save image names to product AFTER storing images
        $product->image1 = $image1Name; 
        $product->image2 = $image2Name;
        $product->image3 = $image3Name;

        $product->save();
        
        return redirect()->route('user.auction.list')->with('success', 'Auction added successfully!');
    }

    public function index() {

        $userId = auth()->id(); // get logged in user id
        
     //   dd($userId);
        $products = Product::where('SellerID', $userId)->get();


          foreach($products as $product) {

            $product->category = $this->categories[$product->category];          
            $product->BidStartTime = Carbon::parse($product->BidStartTime);
            $product->BidStartTime = $product->BidStartTime->format('d-m-Y H:i:s');
          
            $product->BidEndTime = Carbon::parse($product->BidEndTime);
            $product->BidEndTime = $product->BidEndTime->format('d-m-Y H:i:s');
          
          }
        return view('user-auction-list', compact('products'));
      
      }


    public function edit($id)
    {
        // Retrieve the product based on the $id
        $product = Product::find($id);
        $product->category_name = $this->categories[$product->category];          

        // Check if the product exists
        if (!$product) {
            abort(404); // Or handle not found case
        }

        // Pass the product data to the view
        return view('product-edit', ['product' => $product]);
    }


    public function editPost(Request $request,$id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'startingBidPrice' => 'required',
            'reservePrice' => 'required',
            'bidIncrement' => 'required',
            'category' => 'required',
            'startingDate' => 'required',
            'startingTime' => 'required',
            'endingDate' => 'required', 
            'endingTime' => 'required',
            'productName' => 'required',
            'productDescription' => 'required',
            'image1' => 'required|image|max:2048',
            'image2' => 'required|image|max:2048',
            'image3' => 'required|image|max:2048',
            'additionalTerms' => 'nullable',
        ]);

        
        if ($validator->fails()) {
            $validationErrors = implode(', ', $validator->errors()->all());
            $errorMessage = 'Please fix the following errors: ' . $validationErrors;
            return redirect()->back()->with('error', $errorMessage);
        }

        
        // Store data in database
        $startDateTime = $request->startingDate . ' ' . $request->startingTime; 
        $endDateTime = $request->endingDate . ' ' . $request->endingTime;

        $startDateTime = new \DateTime($startDateTime);
        $endDateTime = new \DateTime($endDateTime);

        $product = new Product;
        $product->name = $request->productName;
        $product->description = $request->productDescription;
        $product->category = $request->category; 
        $product->additional_terms = $request->additionalTerms;
        $product->starting_bid_price = $request->startingBidPrice;
        $product->reserve_price = $request->reservePrice;
        $product->bid_increment = $request->bidIncrement;
        $product->BidStartTime = $startDateTime;
        $product->BidEndTime = $endDateTime;
        
        $product->save();
        
        Storage::delete('products/' . $product->image1);
        Storage::delete('products/' . $product->image2);
        Storage::delete('products/' . $product->image3);

        // Store images   

        $image1 = $request->file('image1');
        $image1Name = time().'_1.'.$image1->extension();  
        $image1->storeAs('public/products', $image1Name);

        $image2 = $request->file('image2');
        $image2Name = time().'_2.'.$image2->extension();
        $image2->storeAs('public/products', $image2Name);

        $image3 = $request->file('image3');    
        $image3Name = time().'_3.'.$image3->extension();
        $image3->storeAs('public/products', $image3Name);

        // Save image names to product AFTER storing images
        $product->image1 = $image1Name; 
        $product->image2 = $image2Name;
        $product->image3 = $image3Name;

        $product->save();
        
        return redirect()->route('user.auction.list')->with('success', 'Auction details edited successfully !');
    }

    public function delete(Request $request)
    {
    $productId = $request->input('product_id');
    $product = Product::find($productId);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found');
    }

    $product->delete();
    return redirect()->route('user.auction.list')->with('success', 'Product deleted successfully');
    }


}