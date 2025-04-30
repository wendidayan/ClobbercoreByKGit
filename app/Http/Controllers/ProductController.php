<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Order;

class ProductController extends Controller
{
    //Displaying in Shopping Page
    public function index()
    {
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->where('is_sold', false)->take(5)->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_sold', false)->get();
        $allProducts = Product::where('is_sold', false)->get();

        return view('ShoppingPage', compact('thriftDeals', 'newArrivals', 'allProducts'));
    }

    //Displaying in Homepage
    public function homeview()
    {
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->where('is_sold', false)->take(5)->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_sold', false)->get();
        $allProducts = Product::where('is_sold', false)->get();

        return view('Homepage', compact('thriftDeals', 'newArrivals', 'allProducts'));
    }

    //Displaying in Admin Dashboard
    public function dashview()
    {
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->where('is_sold', false) ->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_sold', false) ->get();
        $allProducts = Product::where('is_sold', false) ->take(10)->get();
        $orders = Order::with(['user', 'paymentMethod', 'orderItems.product'])->get();

        return view('admin.Dashboard', compact('thriftDeals', 'newArrivals', 'allProducts', 'orders'));
    }

    //Displaying Individual Items in Product View
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

    //Adding Products by Section
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string',
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
            'brand' => $request->brand,
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


    //Displaying By Brand
    public function showByBrand($brand)
{
    $products = Product::where('brand', $brand)
    ->where('is_sold', false)
    ->get();

    return view('BrandsPage', compact('products', 'brand'));
}

    public function Clothing()
    {
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->where('is_sold', false)->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_sold', false)->get();
        $allProducts = Product::where('is_sold', false)->get();

        //----For New Arrivals
       // Fetch distinct categories where at least one product meets the conditions
        $categories = Category::whereHas('products', function ($query) {
            $query->where('is_new_arrival', true)
                ->where('is_sold', false);
        })->distinct()->pluck('name');

        // Fetch distinct sizes with conditions: is_new_arrival = true and is_sold = false
        $sizes = Product::distinct()
            ->whereNotNull('size') // Ensure size is not null
            ->where('is_new_arrival', true) // Add condition for new arrivals
            ->where('is_sold', false) // Add condition for products not sold
            ->pluck('size');

        // Fetch distinct colors with conditions: is_new_arrival = true and is_sold = false
        $colors = Product::distinct()
            ->whereNotNull('color') // Ensure color is not null
            ->where('is_new_arrival', true) // Add condition for new arrivals
            ->where('is_sold', false) // Add condition for products not sold
            ->pluck('color');

        //----For Thrift Deals
        // Fetch distinct categories where at least one product meets the conditions
        $categories1 = Category::whereHas('products', function ($query) {
            $query->where('is_thrift_deal', true)
                ->where('is_sold', false);
        })->distinct()->pluck('name');

        // Fetch distinct sizes with conditions: is_new_arrival = true and is_sold = false
        $sizes1 = Product::distinct()
            ->whereNotNull('size') // Ensure size is not null
            ->where('is_thrift_deal', true) // Add condition for new arrivals
            ->where('is_sold', false) // Add condition for products not sold
            ->pluck('size');

        // Fetch distinct colors with conditions: is_new_arrival = true and is_sold = false
        $colors1 = Product::distinct()
            ->whereNotNull('color') // Ensure color is not null
            ->where('is_thrift_deal', true) // Add condition for new arrivals
            ->where('is_sold', false) // Add condition for products not sold
            ->pluck('color');

        //----For All Out Ukay
        // Fetch distinct categories where at least one product meets the conditions
        $categories2 = Category::whereHas('products', function ($query) {
            $query->where('is_sold', false);
        })->distinct()->pluck('name');

        // Fetch distinct sizes with conditions: is_new_arrival = true and is_sold = false
        $sizes2 = Product::distinct()
            ->whereNotNull('size') // Ensure size is not null
            ->where('is_sold', false) // Add condition for products not sold
            ->pluck('size');

        // Fetch distinct colors with conditions: is_new_arrival = true and is_sold = false
        $colors2 = Product::distinct()
            ->whereNotNull('color') // Ensure color is not null
            ->where('is_sold', false) // Add condition for products not sold
            ->pluck('color');



        return view('Clothing', compact('thriftDeals', 'newArrivals', 'allProducts', 'categories', 'sizes', 'colors','categories1', 'sizes1', 'colors1','categories2', 'sizes2', 'colors2'));
    }

   
    public function ClothingFiltering(Request $request)
    {
        // Initialize query for filtering products
        $query = Product::where('is_sold', false); // Only show unsold products
    
        // Apply filters based on the selected tab
        if ($request->has('category') && $request->category) {
            switch ($request->category) {
                case 'new-arrival':
                    $query->where('is_new_arrival', true);
                    break;
                case 'bagsak-presyo':
                    $query->where('is_thrift_deal', true);
                    break;
                case 'all-out-ukay':
                    // No additional filter, show all products
                    break;
            }
        }
    
        // Apply additional filters (size, color, price range)
        if ($request->has('size') && $request->size) {
            $query->where('size', $request->size);
        }
    
        if ($request->has('color') && $request->color) {
            $query->where('color', $request->color);
        }
    
        if (is_numeric($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }
    
        if (is_numeric($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }
    
        // Apply category filter
        if ($request->has('category_filter') && $request->category_filter) {
            $categoryId = Category::where('name', $request->category_filter)->value('id');
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }
        }
    
        // Fetch filtered products
        $products = $query->get();
    
        return response()->json([
            'success' => true,
            'products' => $products,
        ]);
    }
    

}
    
    
    



    











  
 