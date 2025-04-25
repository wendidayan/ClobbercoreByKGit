<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin() {
        return view('admin.ToLogin');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/admin/Dashboard');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/adminlogin');
    }

}
