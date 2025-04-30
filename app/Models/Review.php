<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', 'product_quality_rating',
        'seller_service_rating',
        'delivery_service_rating', 'comment','show_username'
    ];

    // Relationship: Each review belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Each review belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function images()
    {
        return $this->hasMany(ReviewImage::class);
    }

}
