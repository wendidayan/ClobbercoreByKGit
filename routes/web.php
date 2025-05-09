<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ChatController;


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

//Homepage....not yet finalized
Route::get('/Homepage', [ProductController::class, 'homeview'])->name('Homepage');

//Shopping Page after Log In
Route::get('/ShoppingPage', [ProductController::class, 'index'])->name('ShoppingPage');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.view');

//Username Display
Route::get('/get-username', [AuthController::class, 'getUsername'])->name('get.username');

//Placing Order (for COD)
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order-pending', function () {
    return view('orders.pending');
})->name('orders.pending');

//Online Payment
Route::post('/paymongo/checkout', [PaymentController::class, 'createPaymentIntent'])->name('paymongo.checkout');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

//For Cart Payment
Route::get('/payment/cart/success', [PaymentController::class, 'successCartPayment'])->name('payment.cart.success');

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

//Privacy Policy
Route::get('/PrivacyPolicy', function () {
    return view('PrivacyPolicy'); 
})->name('PrivacyPolicy');

//For Branded Items
Route::get('/brands/{brand}', [ProductController::class, 'showByBrand'])->name('BrandsPage');


//Filter for Specific Products
Route::get('/Clothing', [ProductController::class, 'Clothing'])->name('Clothing');
Route::get('/clothing/filter', [ProductController::class, 'ClothingFiltering'])->name('clothing.filter');


//Invoice Client Side
Route::get('/E-Invoice/{id}', [OrderController::class, 'clientInvoice'])->name('invoice.show');

//User Profile
Route::get('/UserProfile', [OrderController::class, 'showCompletedOrders'])->name('UserProfile');
Route::post('order/{orderId}/rate', [ReviewController::class, 'rateOrder'])->name('order.rate');
Route::post('/user/address', [AuthController::class, 'storeAddress'])->name('user.address.store');
Route::put('/addresses/{id}', [AuthController::class, 'updateAddress'])->name('addresses.update');
Route::post('/addresses/{id}/set-default', [AuthController::class, 'setDefault'])->name('addresses.setDefault');
Route::patch('/order/{order}/complete', [OrderController::class, 'markAsCompleted'])->name('order.complete');
Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
Route::post('/update-profile', [OrderController::class, 'updateProfile'])->name('user.updateProfile');



















//Server-side
//Admin Login
Route::prefix('admin')->group(function() {
    Route::get('/adminlogin', [AdminController::class, 'showLogin'])->name('admin.Login');
    Route::post('/adminlogin', [AdminController::class, 'login']);
    Route::get('/Dashboard', [ProductController::class, 'dashview'])->middleware('auth:admin')->name('Dashboard');
    Route::get('/adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin.ToLogin', function () {
        return view('admin.ToLogin'); 
    })->name('admin.ToLogin');
});

// Product Management
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

//Added By Karilaaa
//Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit'); //route to fetch the data
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update'); //route to update the data
Route::post('/admin/update-order-status/{id}', [ProductController::class, 'updateOrderStatus'])->middleware('auth:admin')->name('order.updateStatus');//route for updating the status of the order for admin side

//Fetch Data to Confirm Order-Modal
Route::get('/order-details/{id}', [OrderController::class, 'getOrderDetails']);

//Fetch Data and Redirect to Generate Invoice
Route::get('/generate-invoice', [OrderController::class, 'generateInvoice'])->name('generate.invoice');

//Fetch notification data and mark as read
Route::post('/admin/transactions/confirm/{transactionId}', [OrderController::class, 'confirmPayment'])->name('admin.transactions.confirm');


//Generate Invoice
//Route::post('/store-invoice', [OrderController::class, 'storeInvoice'])->name('store.invoice');

Route::post('/store-invoice', [OrderController::class, 'storeInvoice'])->name('store.invoice');
Route::get('/view-invoice/{id}', [OrderController::class, 'showInvoice'])->name('show.invoice');
Route::post('/send-invoice/{order}', [AdminController::class, 'send'])->name('invoice.send');













// To be finalized............




Route::get('/Notif-View-Details', function () {
    return view('Notif-View-Details'); 
})->name('Notif-View-Details');


//not working
Route::get('/forgot-password', function () {
    return view('auth.ForgotPassword'); // Your forgot password page
})->name('password.request');

Route::post('/forgot-password/send-code', [AuthController::class, 'sendResetCode']);
Route::post('/forgot-password/verify-code', [AuthController::class, 'verifyResetCode']);
Route::post('/forgot-password/reset', [AuthController::class, 'resetPassword']);


//Chat Support Routes
// Chat Routes
/*Route::middleware(['auth:admin'])->group(function () {
    Route::get('/chat/messages', [ChatController::class, 'getMessages']);
    Route::post('/chat/send', [ChatController::class, 'sendMessage']);
    Route::get('/chat/users', [ChatController::class, 'getUsers']);
    Route::post('/chat/mark-read', [ChatController::class, 'markAsRead']);
});*/

// Chat routes accessible to both clients and admins
Route::middleware(['auth:admin,web'])->group(function () {
    Route::get('/chat/messages', [ChatController::class, 'getMessages']);
    Route::post('/chat/send', [ChatController::class, 'sendMessage']);
    Route::get('/chat/users', [ChatController::class, 'getUsers']);
    Route::post('/chat/mark-read', [ChatController::class, 'markAsRead']);
});