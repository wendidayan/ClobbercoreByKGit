<?php

namespace App\Listeners;

use App\Events\TransactionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\PaymentNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminLogin; // Assuming you have an Admin model
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;
use Illuminate\Notifications\DatabaseNotification;

class SendPaymentNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    /**
     * Handle the event.
     */
    public function handle(TransactionCreated $event): void
    {
        $transaction = $event->transaction;

        Log::info('SendPaymentNotification listener triggered', ['transaction' => $transaction]);

        /*// Only notify for GCash or PayMaya
        if (in_array($transaction->payment_method, ['gcash', 'paymaya'])) {
            // Fetch the admin user with username 'admin'
            $admin = AdminLogin::where('username', 'admin')->first();

            if ($admin) {
                Log::info('Admin user found', ['admin_id' => $admin->id, 'username' => $admin->username]);
            
                // Notify the admin
                $admin->notify(new PaymentNotification($transaction));
            
                Log::info('Notification sent to admin', ['admin_id' => $admin->id]);
            } else {
                Log::warning('Admin user with username "admin" not found.');
            }
        }*/

        // Only notify for GCash or PayMaya
        if (in_array($transaction->payment_method, ['gcash', 'paymaya'])) {
            $admin = AdminLogin::where('username', 'admin')->first();

            if ($admin) {
                Log::info('Admin user found', ['admin_id' => $admin->id, 'username' => $admin->username]);

                // Check for existing notification
                $alreadyNotified = $admin->notifications()
                    ->where('type', PaymentNotification::class)
                    ->where('data->transaction_id', $transaction->id)
                    ->exists();

                if (!$alreadyNotified) {
                    $admin->notify(new PaymentNotification($transaction));
                    Log::info('Notification sent to admin', ['admin_id' => $admin->id]);
                } else {
                    Log::info('Notification already exists for transaction', ['transaction_id' => $transaction->id]);
                }
            } else {
                Log::warning('Admin user with username "admin" not found.');
            }
        }
    }
}

