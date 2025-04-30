<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'street',
        'province',
        'region',
        'city',
        'barangay',
        'zip_code',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // Relationship: A customer can have many reviews
     public function reviews()
     {
         return $this->hasMany(Review::class);
     }
}
