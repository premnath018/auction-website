<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'bid_amount'
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}