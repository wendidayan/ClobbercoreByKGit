<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    //
    public function index()
    {
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->where('is_sold', false)->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_sold', false)->get();
        $allProducts = Product::where('is_sold', false)->get();

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




    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price' => 'required|numeric',
        'category_name' => 'required|string|max:255',
        'subcategory_name' => 'required|string|max:255',
        'size' => 'nullable|string',
        'color' => 'nullable|string',
        'style' => 'nullable|string',
        'material' => 'nullable|string',
        'condition' => 'nullable|string',
        'description' => 'nullable|string',
        'is_new_arrival' => 'nullable|boolean',
        'is_thrift_deal' => 'nullable|boolean',
    ]);

    // Handle Image Upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/products'), $imageName);
        $imagePath = 'images/products/' . $imageName;
    }

    // Find or create category
    $category = Category::firstOrCreate(['name' => $request->category_name]);

    // Find or create subcategory
    $subcategory = Subcategory::firstOrCreate([
        'name' => $request->subcategory_name,
        'category_id' => $category->id
    ]);

    // Create Product
    Product::create([
        'name' => $request->name,
        'image' => $imagePath,
        'price' => $request->price,
        'category_id' => $category->id,
        'subcategory_id' => $subcategory->id,
        'size' => $request->size,
        'color' => $request->color,
        'style' => $request->style,
        'material' => $request->material,
        'condition' => $request->condition,
        'description' => $request->description,
        'is_new_arrival' => $request->is_new_arrival ? 1 : 0,
        'is_thrift_deal' => $request->is_thrift_deal ? 1 : 0,

    ]);

    return response()->json([
        'success' => true,
        'message' => 'Product added successfully!'
    ]);
    
}






































    public function Clothing()
    {
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->where('is_sold', false)->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_sold', false)->get();
        $allProducts = Product::where('is_sold', false)->get();


        // Fetch categories, subcategories, sizes, and colors
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $sizes = Product::select('size')->distinct()->get();
        $colors = Product::select('color')->distinct()->get();


        return view('Clothing', compact('thriftDeals', 'newArrivals', 'allProducts', 'categories', 'subcategories', 'sizes', 'colors'));
    }

    public function applyFilters(Request $request)
    {
        \Log::info('Filters applied:', $request->all()); 
    
        $query = Product::with('category', 'subcategory'); 
    
        // Apply filters
        if ($request->category) {
            $query->where('category_id', $request->category);
        }
        if ($request->subcategory) {
            $query->where('subcategory_id', $request->subcategory);
        }
        if ($request->size) {
            $query->where('size', $request->size);
        }
        if ($request->color) {
            $query->where('color', $request->color);
        }
    
        // Fetch filtered products
        $filteredProducts = $query->get();
    
        \Log::info('Filtered products:', $filteredProducts->toArray()); // Log filtered products
    
        return response()->json(['products' => $filteredProducts]);
    }
    
    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json(['subcategories' => $subcategories]);
    }

  
 }