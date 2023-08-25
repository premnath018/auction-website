<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'starting_bid_price', 'current_bid_price',
        'bid_increment', 'reserve_price', 'BidStartTime', 'BidEndTime',
        'SellerID', 'BuyerID', 'image1', 'image2', 'image3',
        'status', 'payment_status', 'number_of_bids', 'transaction_id',
        'additional_terms', 'category',
    ];
    
    

    public function seller()
    {
        return $this->belongsTo(User::class, 'SellerID');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'BuyerID');
    }
}
