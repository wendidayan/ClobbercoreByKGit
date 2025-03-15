<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'price', // Store the product price at the time of adding to cart
    ];

    // Each cart item belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Each cart item corresponds to a specific product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}