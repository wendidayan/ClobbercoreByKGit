<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name', 'category_id', 'subcategory_id', 'price', 'is_thrift_deal', 'is_new_arrival',
        'image', 'description', 'color', 'size', 'style', 'condition', 'material'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

}
