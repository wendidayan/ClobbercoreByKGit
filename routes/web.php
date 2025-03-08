<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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




Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure a 'dashboard.blade.php' exists in resources/views
})->name('dashboard');



Route::get('/ShoppingPage', [ProductController::class, 'index'])->name('ShoppingPage');
