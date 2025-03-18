<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;


//Client-Side
// Default Route (Landing Page)
Route::get('/', function () {
    return view('auth.ToLogin'); // Show ToLogin as the default page
});

// Traditional Auth Routes
Route::get('/signup', function () { return view('auth.ToSignUp'); })->name('signup');
Route::get('/login', function () { return view('auth.ToLogin'); })->name('login');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup.process');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google Auth Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/call-back', [AuthController::class, 'handleGoogleCallback']);

//Shopping Page after Log In
Route::get('/ShoppingPage', [ProductController::class, 'index'])->name('ShoppingPage');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.view');

//Placing Order (redirect to pending page if COD)
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order-pending', function () {
    return view('orders.pending');
})->name('orders.pending');

//Online Payment
Route::post('/paymongo/checkout', [PaymentController::class, 'createPaymentIntent'])->name('paymongo.checkout');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

//Mine Method (passing details to ToPay blade)
Route::middleware(['auth'])->group(function () {
    Route::get('/order/topay', [OrderController::class, 'toPay'])->name('order.topay');
    Route::post('/order/mine/{productId}', [OrderController::class, 'mine'])->name('order.mine');
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
});

//Cart
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

    Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/place-order', [CartController::class, 'cartPlaceOrder'])->name('cart.placeOrder');
    Route::get('/order/topay/cart', [CartController::class, 'toPayCart'])->name('order.topaycart'); 
    Route::post('/order/place/cart', [CartController::class, 'placeOrderCart'])->name('order.placecart');
});






//Admin-Side
Route::get('/Dashboard', function () {
    return view('Dashboard'); // Ensure a 'dashboard.blade.php' exists in resources/views
})->name('Dashboard');


Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');






// To be finalized............
//Filter for Specific Products
Route::get('/Clothing', [ProductController::class, 'Clothing'])->name('Clothing');
Route::get('/apply-filters', [ProductController::class, 'applyFilters']);
Route::get('/get-subcategories', [ProductController::class, 'getSubcategories']);

Route::get('/Homepage', function () {
    return view('Homepage'); // Ensure a 'dashboard.blade.php' exists in resources/views
})->name('Homepage');


Route::get('/Collections', function () {
    return view('Collections'); // Ensure a 'dashboard.blade.php' exists in resources/views
})->name('Collections');

Route::get('/PlaceOrder', function () {
    return view('PlaceOrder'); // Ensure a 'dashboard.blade.php' exists in resources/views
})->name('PlaceOrder');



Route::get('/UserProfile', function () {
    return view('UserProfile'); // Ensure a 'dashboard.blade.php' exists in resources/views
})->name('UserProfile');


Route::get('/categories/{type}', [ProductController::class, 'getCategoriesByType']);
Route::get('/subcategories/{categoryId}', [ProductController::class, 'getSubcategoriesByCategory']);
Route::get('/products/filters', [ProductController::class, 'getFilters']);
Route::get('/products/filter', [ProductController::class, 'getFilteredProducts']);