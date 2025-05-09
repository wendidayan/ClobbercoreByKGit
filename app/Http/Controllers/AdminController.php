<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InvoiceNotification;
use App\Models\Order;

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






    //--------changes--------------//

    public function send(Order $order)
{
    $order->load('invoice'); // ensure invoice data is loaded

    if (!$order->invoice) {
        return redirect()->back()->with('error', 'Invoice not found for this order.');
    }

    // Create the notification
    InvoiceNotification::create([
        'order_id' => $order->id,
        'user_id' => $order->user_id,
        'invoice_number' => $order->invoice->invoice_number,
        'delivery_date' => $order->invoice->delivery_date,
        'delivery_time' => $order->invoice->delivery_time,
    ]);

    return redirect()->back()->with('success', 'Invoice sent and saved successfully.');
}

}