<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);

        if ($product->is_sold) {
            return redirect()->route('cart.view')->with('error', 'This product has already been sold.');
        }
    
        // Check if the product is already in the cart
        $existingCartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();
    
        if ($existingCartItem) {
            return redirect()->route('cart.view')->with('error', 'Product already in cart');
        }
    
        // Add product to cart
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $product->price, // Store price at the time of adding
        ]);
    
        // Redirect to cart (PlaceOrder.blade.php)
        return redirect()->route('cart.view')->with('success', 'Product added to cart');
    }
    
    public function viewCart()
{
    // Find all sold products in the user's cart
    $soldItems = CartItem::where('user_id', Auth::id())
        ->whereHas('product', function ($query) {
            $query->where('is_sold', true);
        })
        ->get();

    // Delete sold items from the cart
    foreach ($soldItems as $item) {
        $item->delete();
    }

    // Fetch remaining cart items (only unsold products)
    $cartItems = CartItem::where('user_id', Auth::id())
        ->with('product')
        ->get();

    return view('PlaceOrder', compact('cartItems'));
}

    public function removeFromCart($cartItemId)
    {
        $cartItem = CartItem::where('id', $cartItemId)->where('user_id', Auth::id())->firstOrFail();
        $cartItem->delete();

        return redirect()->route('cart.view')->with('success', 'Product removed from cart');
    }
}
