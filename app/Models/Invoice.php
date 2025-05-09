<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = [
        'order_id',
        'delivery_date',
        'delivery_time',
        'invoice_number',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
