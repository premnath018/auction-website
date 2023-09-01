<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Bidding;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class AuctionController extends Controller
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
    
    public function formatDateTime($dateTimeString)
    {
    return Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString)->format('M d, Y H:i:s');
    }
  

    public function AuctionProductDetail($productId)
    {
        // Fetch the product by product ID
        $product = Product::find($productId);
        $product->category_name = $this->categories[$product->category];          
        // Fetch the user by user ID
        $user = User::find($product->SellerID);
        $Buyer = User::find($product->BuyerID);
        $product->BidStartTimeClock = $this->formatDateTime($product->BidStartTime); 
        $product->BidEndTimeClock =  $this->formatDateTime($product->BidEndTime); 
        $product->now = Carbon::now();
        if ($user && $product) {
            return view('auction-detail', ['user' => $user, 'product' => $product,'buyer' => $Buyer]);
        } else {
            return redirect()->route('auction.notfound');
        }
    }



    public function index()
    {

        $now = now(); // Get the current datetime

        $liveAuctions = Product::where('BidStartTime', '<', $now)
            ->where('BidEndTime', '>', $now)
            ->where('SellerID', '!=', auth()->id()) // Ensure the seller is not the same as the logged-in user
            ->inRandomOrder() // Randomly order the results
            ->take(3) // Get 3 live auction products
            ->get();
    
        $upcomingAuctions = Product::where('BidStartTime', '>', $now)
            ->where('SellerID', '!=', auth()->id())
            ->orderBy('BidStartTime')
            ->inRandomOrder() // Randomly order the results
            ->take(3) // Get 3 upcoming products
            ->get();

        foreach ($liveAuctions as $auction) {
                $auction->category_name = $this->categories[$auction->category];
                $auction->seller = User::find($auction->SellerID);
                $auction->BidStartTimeClock =  $this->formatDateTime($auction->BidStartTime); 
                $auction->BidEndTimeClock =  $this->formatDateTime($auction->BidEndTime); 

            }
        
        foreach ($upcomingAuctions as $auction) {
                $auction->category_name = $this->categories[$auction->category];
                $auction->seller = User::find($auction->SellerID);
                $auction->BidStartTimeClock =  $this->formatDateTime($auction->BidStartTime); 
                $auction->BidEndTimeClock =  $this->formatDateTime($auction->BidEndTime); 
            }
    
        return view('index', [
            'liveAuctions' => $liveAuctions,
            'upcomingAuctions' => $upcomingAuctions,
        ]);

    }

    public function liveAuctions()
    {
        $now = now(); // Get the current datetime

        $liveAuctions = Product::where('BidStartTime', '<', $now)
            ->where('BidEndTime', '>', $now)
            ->where('SellerID', '!=', auth()->id()) // Ensure the seller is not the same as the logged-in user
            ->orderBy('BidEndTime') // Order by finishing time
            ->paginate(9); 

        foreach ($liveAuctions as $auction) {
            $auction->category_name = $this->categories[$auction->category];
            $auction->seller = User::find($auction->SellerID);
            $auction->BidStartTimeClock =  $this->formatDateTime($auction->BidStartTime); 
            $auction->BidEndTimeClock =  $this->formatDateTime($auction->BidEndTime); 
        }

        return view('auction-hub', [
            'liveAuctions' => $liveAuctions,
        ]);
    }
    public function upcomingAuctions()
    {
        $now = now(); // Get the current datetime
    
        $upcomingAuctions = Product::where('BidStartTime', '>', $now)
            ->where('SellerID', '!=', auth()->id()) // Ensure the seller is not the same as the logged-in user
            ->orderBy('BidStartTime') // Order by starting time
            ->paginate(9);
    
        foreach ($upcomingAuctions as $auction) {
            $auction->category_name = $this->categories[$auction->category];
            $auction->seller = User::find($auction->SellerID);
            $auction->BidStartTimeClock =  $this->formatDateTime($auction->BidStartTime); 
            $auction->BidEndTimeClock =  $this->formatDateTime($auction->BidEndTime); 
        }
    
        return view('auction-upcoming', [
            'upcomingAuctions' => $upcomingAuctions,
        ]);
        }
    
        public function search(Request $request)
        {
            $query = $request->search; // Get the search query from the request
            
            $upcomingAuctions = Product::where('BidStartTime', '>', now()) // Assuming you have a 'BidStartTime' column
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%")
                      ->orWhere('description', 'like', "%$query%");
                })
                ->orderBy('BidStartTime')
                ->limit(6)
                ->get();
    
            $liveAuctions = Product::where('BidStartTime', '<=', now()) // Assuming you have a 'BidStartTime' column
                ->where('BidEndTime', '>=', now()) // Assuming you have a 'BidEndTime' column
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%")
                      ->orWhere('description', 'like', "%$query%");
                })
                ->orderBy('BidEndTime')
                ->limit(6)
                ->get();
                
            foreach ($upcomingAuctions as $auction) {
                $auction->category_name = $this->categories[$auction->category];
                $auction->seller = User::find($auction->SellerID);
                $auction->BidStartTimeClock =  $this->formatDateTime($auction->BidStartTime); 
                $auction->BidEndTimeClock =  $this->formatDateTime($auction->BidEndTime); 
                }
                
        foreach ($liveAuctions as $auction) {
            $auction->category_name = $this->categories[$auction->category];
            $auction->seller = User::find($auction->SellerID);
            $auction->BidStartTimeClock =  $this->formatDateTime($auction->BidStartTime); 
            $auction->BidEndTimeClock =  $this->formatDateTime($auction->BidEndTime); 
        }
                

            return view('search-results', compact('upcomingAuctions', 'liveAuctions'));
        }

        public function placeBid(Request $request)
        {
            $product = Product::findOrFail($request->productId);
            // Create a new bidding record
            Bidding::create([
                'product_id' => $product->id,
                'user_id' => auth()->id(),
                'bid_amount' => $request->bid_amount,
            ]);
        
            // Update the product's bid information
            $product->current_bid_price = $request->bid_amount;
            $product->BuyerID = auth()->id();
            $product->number_of_bids++;
            $product->save();
        
            // Return a JSON response
            return response()->json([
                            'success' => true,
                            'message' => 'Bid placed successfully!',
                            'current_bid' => $product->current_bid_price,
                            'number_of_bids' => $product->number_of_bids,
            ]);
        }

        public function getProductLeaderboard(Request $request)
        {
            $product = Product::findOrFail($request->productId);

            $topBids = Bidding::where('product_id', $request->productId)
            ->join('users', 'biddings.user_id', '=', 'users.id')
            ->select('users.name', 'biddings.bid_amount')
            ->orderBy('biddings.bid_amount', 'desc')
            ->limit(5)
            ->get();
    

            return response()->json([
                'success' => true,
                'topBids' => $topBids,
                'current_bid' => $product->current_bid_price,
                'number_of_bids' => $product->number_of_bids,
            ]);
        }

        public function getUserBiddingsForProduct(Request $request)
        {
            $id =  auth()->id();

            $userBiddings = Bidding::where('user_id', $id)
                ->where('product_id', $request->productId)
                ->with('product') // Assuming you have a relationship set up in Bidding model to fetch the associated product
                ->orderByDesc('bid_amount') // Order by highest bid amount
                ->get();

            foreach ($userBiddings as $bidding) {
                $bidding->formatted_timestamp = Carbon::parse($bidding->created_at)->format('H:i:s d-M-Y');
            }            

            return response()->json([
                'success' => true,
                'userBiddings' => $userBiddings
            ]);
        }

        public function myBiddings()
        {
            $userId = auth()->id();
        
            $myBiddings = Bidding::with(['product', 'user'])
                ->where('user_id', $userId)
                ->groupBy(['product_id', 'user_id'])
                ->selectRaw('MAX(bid_amount) as highest_bid_amount, product_id, user_id')
                ->orderByDesc('highest_bid_amount')
                ->paginate(9);
        
            $myBiddings->load(['product', 'user']);

            foreach ($myBiddings as $bidding) {
                $product = $bidding->product;
                $bidding->product_name = $product->name;
                $bidding->product_image = $product->image1; // Assuming you want the first image
                $bidding->starting_bid = $product->starting_bid_price;
                $bidding->highest_bid = $this->getHighestAmount($product);
                $bidding->auction_status = $this->getAuctionStatus($product);
                $bidding->bid_status = $this->getBidStatus($product, $bidding);
                $bidding->product_id = $product->id;
                $seller = User::find($product->SellerID);
                $bidding->seller = $seller->name;
            }
        //    dd($myBiddings);

            return view('user-biddings', ['myBiddings' => $myBiddings]);
        }
        
        private function getHighestAmount($product)
        {
            $bidding = Bidding::where('product_id', $product->id)
                ->orderByDesc('bid_amount')
                ->limit(1)
                ->first();
        
            if ($bidding) {
                return $bidding->bid_amount;
            }
        
            return 'No bidder yet';
        }

        private function getAuctionStatus($product)
        {
            $now = now();
            if ($now >= $product->BidStartTime && $now <= $product->BidEndTime) {
                return 'Ongoing';
            } elseif ($now > $product->BidEndTime) {
                return 'Finished';
            } else {
                return 'Upcoming';
            }
        }
    
        private function getBidStatus($product, $bidding)
        {
            $now = now();
            if ($now >= $product->BidStartTime && $now <= $product->BidEndTime) {
                if ($bidding->highest_bid_amount >= $product->current_bid_price) {
                    return 'Leading';
                } else {
                    return 'Outbid';
                }
            } elseif ($now > $product->BidEndTime) {
                if ($product->BuyerID === $bidding->user_id) {
                    return 'Successful';
                } else {
                    return 'Lost';
                }
            } else {
                return 'Upcoming';
            }
        }

        public function bidsWon(){
            $successfullBids = Product::where('BuyerID', '=', auth()->id()) // Only products where SellerID matches the logged-in user
            ->where('BidEndTime', '<', now()) // Check BidEndTime
            ->paginate(9); // Order by finishing time
            foreach ($successfullBids as $bidding) {
            $seller = User::find($bidding->SellerID);
            $bidding->seller = $seller->name;
            }
       //     dd($successfullBids);
            return view('successful-biddings', ['successfulbiddings' => $successfullBids]);

            
        }




    }