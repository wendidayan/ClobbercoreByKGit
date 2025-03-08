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

    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Find similar products based on category_id (or another attribute)
        $similarProducts = Product::where('style', $product->style)
                              ->where('id', '!=', $product->id)
                              ->take(10) // Limit results
                              ->get();

        return view('ProductView', compact('product', 'similarProducts'));
    }

}
