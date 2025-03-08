<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->get();
        $newArrivals = Product::where('is_new_arrival', true)->get();
        $allProducts = Product::all();

        return view('ShoppingPage', compact('thriftDeals', 'newArrivals', 'allProducts'));
    }
}
