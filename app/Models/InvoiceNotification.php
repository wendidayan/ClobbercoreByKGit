<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceNotification extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceNotificationFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'invoice_number',
        'delivery_date',
        'delivery_time',
    ];
    

}
