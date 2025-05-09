<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Order;
use App\Models\Review;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Transaction;
use App\Models\InvoiceNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Messages;


class ProductController extends Controller
{
    //Displaying in Shopping Page
    public function index()
    {
        $user = Auth::user();
        // Get products based on filters
        $thriftDeals = Product::where('is_thrift_deal', true)->where('is_sold', false)->take(5)->get();
        $newArrivals = Product::where('is_new_arrival', true)->where('is_sold', false)->get();
        $allProducts = Product::where('is_sold', false)->get();

        $reviews = Review::with(['user', 'images'])->latest()->paginate(1); // You can change 5 to any number per page
        // Get updated cart count
        $cartCount = CartItem::where('user_id', $user->id)->count();

        $notifications = InvoiceNotification::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

        $notifCount = InvoiceNotification::where('user_id', $user->id)->count();
 

        return view('ShoppingPage', compact('thriftDeals', 'newArrivals', 'allProducts','reviews', 'cartCount','user', 'notifications', 'notifCount'));
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
        $allProducts = Product::where('is_sold', false) ->get();
        $orders = Order::with(['user', 'paymentMethod', 'orderItems.product'])->get();

        //filtering recent orders, when there is no transaction
        $recentOrders = Order::whereDoesntHave('transaction')
            ->where('status', 'pending')
            ->with('user')
            ->get();
        $notifications = Auth::user()->unreadNotifications;

        // Fetch transactions with related orders and users
        $transactions = Transaction::with('order.user')->get();

        $orderCount = Order::count(); // Count the total number of orders to be displayed in the dashboard
        $userCount = User::count(); // Count the total number of users who signed up

        // Calculate monthly revenue
        $monthlyRevenue = Transaction::selectRaw('MONTH(created_at) as month, SUM(amount) as revenue')
            ->where('status', 'paid') // Assuming you want to filter by completed transactions
            ->whereYear('created_at', now()->year) // Filter by the current year
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format the data for the chart
        $chartData = [
            'labels' => $monthlyRevenue->pluck('month')->map(function ($month) {
                return \Carbon\Carbon::create()->month($month)->format('F'); // Convert month number to name
            }),
            'revenue' => $monthlyRevenue->pluck('revenue'),
        ];

        // Calculate total earnings and display it in the dashboard
        $totalEarnings = Transaction::where('status', 'paid')->sum('amount');

        $adminId = Auth::id();

        // Count unique users who messaged the admin
        $uniqueMessageSenders = Messages::where('receiver_id', $adminId)
            ->where('receiver_type', 'admin')
            ->distinct('sender_id')
            ->count('sender_id');

        return view('admin.Dashboard', compact(
            'thriftDeals', 
            'newArrivals', 
            'allProducts', 
            'orders', 
            'orderCount', 
            'userCount', 
            'transactions', 
            'recentOrders', 
            'chartData',
            'notifications',
            'totalEarnings',
            'uniqueMessageSenders'
        ));
    }

    //Displaying Individual Items in Product View
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        // Find similar products based on category_id (or another attribute)
        $similarProducts = Product::where('style', $product->style)
                        ->where('id', '!=', $product->id)
                        ->paginate(5);

        $reviews = Review::with(['user', 'images'])->latest()->paginate(1);

        // Get updated cart count
        $cartCount = CartItem::where('user_id', $user->id)->count();

        $notifications = InvoiceNotification::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

        $notifCount = InvoiceNotification::where('user_id', $user->id)->count();

        return view('ProductView', compact('product', 'similarProducts','reviews', 'cartCount', 'user', 'notifications', 'notifCount'));
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
        $product = Product::create([
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

        /*Product::create([
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

        ]);*/

        return response()->json([
            'success' => true,
            //'message' => 'Product added successfully!'
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                //'image' => asset('storage/' . $product->image),
                'image' => asset($product->image), // Use asset() to get the full URL, store the path of the image in the database
            ],
        ]);
        
    }














    

    //Displaying By Brand
    public function showByBrand(Request $request, $brand)
    {
        $user = Auth::user();
        // Base query
        $query = Product::where('brand', $brand)->where('is_sold', false);

        // Get all possible filter options for the current brand
        $availableColors = Product::where('brand', $brand)->where('is_sold', false)->distinct()->pluck('color');
        $availableSizes = Product::where('brand', $brand)->where('is_sold', false)->distinct()->pluck('size');

        // Min and max price for range
        $priceRange = Product::where('brand', $brand)->where('is_sold', false)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        // Apply filters if present
        if ($request->filled('color')) {
            $query->where('color', $request->input('color'));
        }

        if ($request->filled('size')) {
            $query->where('size', $request->input('size'));
        }

        if ($request->filled('min_price') || $request->filled('max_price')) {
            $min = $request->input('min_price');
            $max = $request->input('max_price');

            if ($min && $max) {
                $query->whereBetween('price', [$min, $max]);
            } elseif ($min) {
                $query->where('price', '>=', $min);
            } elseif ($max) {
                $query->where('price', '<=', $max);
            }
        }

        $products = $query->get();
        $notifications = InvoiceNotification::where('user_id', $user->id)
        ->latest()
        ->take(5)
        ->get();
        $notifCount = InvoiceNotification::where('user_id', $user->id)->count();
        $cartCount = CartItem::where('user_id', $user->id)->count();


        return view('BrandsPage', compact(
            'products',
            'brand',
            'availableColors',
            'availableSizes',
            'priceRange',
            'notifCount',
            'user',
            'notifications',
            'cartCount'
        ));
    }

    public function Clothing()
    {
        $user = Auth::user();
        // Get updated cart count
        $cartCount = CartItem::where('user_id', $user->id)->count();

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

            $notifications = InvoiceNotification::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

        $notifCount = InvoiceNotification::where('user_id', $user->id)->count();



        return view('Clothing', compact('thriftDeals', 'newArrivals', 'allProducts', 'categories', 'sizes', 'colors','categories1', 'sizes1', 'colors1','categories2', 'sizes2', 'colors2','cartCount','user','notifications','notifCount'));
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
    
    
    



    











  
 