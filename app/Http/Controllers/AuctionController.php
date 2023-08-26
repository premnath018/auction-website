<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
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
    
  

    public function AuctionProductDetail($productId)
    {

        function formatDateTime($dateTimeString)
        {
        return Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString)->format('M d, Y H:i:s');
        }


        // Fetch the product by product ID
        $product = Product::find($productId);
        $product->category_name = $this->categories[$product->category];          
        // Fetch the user by user ID
        $user = User::find($product->SellerID);
        $product->BidStartTime = formatDateTime($product->BidStartTime); 
        $product->BidEndTime = formatDateTime($product->BidEndTime); 
        if ($user && $product) {
            return view('auction-detail', ['user' => $user, 'product' => $product]);
        } else {
            return redirect()->route('auction.notfound');
        }
    }
}
