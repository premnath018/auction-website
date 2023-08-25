<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'userdetails'; // Specify the table name

    protected $fillable = [
        'user_id',
        'email', 
        'address',
        'city',
        'state',
        'postal_code',
        'phone',
        'gender',
        'vpa_id',
    ];

    // Define any relationships or additional methods here

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' is the foreign key in userdetails table
    }
}
