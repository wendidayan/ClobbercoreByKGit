<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    // Traditional Signup
    public function signup(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/')->with('success', 'Sign-up successful!');
    }

    // Traditional Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('ShoppingPage');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    // Google Redirect
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google Callback
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'fullname' => $googleUser->getName(),
                'username' => explode('@', $googleUser->getEmail())[0], // Generate username from email
                'password' => null,
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
            ]
        );

        Auth::login($user);
        return redirect()->route('ShoppingPage');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //Username Display
    public function getUsername()
    {
        if (Auth::check()) {
            return response()->json(['username' => Auth::user()->username]);
        }
        return response()->json(['error' => 'User not logged in'], 401);
    }

    /*Address Management */

    public function storeAddress(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:20',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
        ]);
    
        // Check if this is the user's first address
        $isFirstAddress = auth()->user()->addresses()->count() === 0;
    
        // Create the address
        $address = auth()->user()->addresses()->create([
            'phone_number' => $request->input('phone_number'),
            'street' => $request->input('street'),
            'barangay' => $request->input('barangay'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'region' => $request->input('region'),
            'zip_code' => $request->input('zip_code'),
            'is_default' => $isFirstAddress, // Set this address as default if it's the first one
        ]);
    
        return redirect()->back()->with('address_added', true);
    

    }

    public function setDefault($id)
    {
        $user = auth()->user();

        // Unset current default
        $user->addresses()->update(['is_default' => false]);

        // Set the selected one
        $address = $user->addresses()->findOrFail($id);
        $address->is_default = true;
        $address->save();

        return redirect()->back()->with('default_success', 'Default address updated.');
    }

    public function updateAddress(Request $request, $id)
{
    $request->validate([
        'phone_number' => 'required|string|max:20',
        'street' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'province' => 'nullable|string|max:255',
        'region' => 'nullable|string|max:255',
        'zip_code' => 'nullable|string|max:20',
    ]);

    $address = auth()->user()->addresses()->findOrFail($id);
    $address->update($request->only([
        'phone_number', 'street', 'city', 'province', 'region', 'zip_code'
    ]));

    return redirect()->back()->with('address_updated', true);
}



    /*Password Reset.....NOT WORKING YET */

    public function sendResetCode(Request $request)
{
    $request->validate(['email' => 'required|email']);
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Email not found'], 404);
    }

    $code = rand(100000, 999999);
    Session::put('reset_email', $user->email);
    Session::put('reset_code', $code);

    // Log to check the email sending
    Log::info("Sending reset code to: " . $user->email);

    try {
        Mail::raw("Your reset code is: $code", function ($message) use ($user) {
            $message->to($user->email)->subject('Password Reset Code');
        });
        Log::info("Reset code sent successfully to: " . $user->email);
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error sending email: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Error sending email'], 500);
    }

    return response()->json(['success' => true, 'message' => 'Code sent']);
}

public function verifyResetCode(Request $request)
{
    $request->validate(['code' => 'required']);

    if (Session::get('reset_code') != $request->code) {
        return response()->json(['success' => false, 'message' => 'Invalid code'], 400);
    }

    return response()->json(['success' => true, 'message' => 'Code verified']);
}

public function resetPassword(Request $request)
{
    $request->validate([
        'password' => 'required|confirmed|min:6',
    ]);

    $email = Session::get('reset_email');
    $user = User::where('email', $email)->first();

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not found'], 404);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    Session::forget(['reset_email', 'reset_code']);

    return response()->json(['success' => true, 'message' => 'Password updated']);
}


}
