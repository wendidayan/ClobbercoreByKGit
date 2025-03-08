<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'price', 'is_thrift_deal', 'is_new_arrival', 'image', 'description'
    ];
}
