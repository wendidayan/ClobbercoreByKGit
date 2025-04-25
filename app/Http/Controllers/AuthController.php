<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

}
