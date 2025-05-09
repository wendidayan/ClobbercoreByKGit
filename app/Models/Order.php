<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'payment_method_id', 'delivery_method_id', 'shipping_address_id', 'meetup_location_id', 'total_price', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class); 
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class); 
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, foreignKey: 'shipping_address_id');
    }

    public function meetupLocation(): BelongsTo
    {
        return $this->belongsTo(MeetUpLocation::class, foreignKey: 'meetup_location_id');
    }

    public function deliveryMethod(): BelongsTo
    {
        return $this->belongsTo(DeliveryMethod::class);
    }

    public function calculateSubtotal(): float
    {
        return $this->orderItems->sum(fn($item) => $item->product->price);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'order_id');
    }

    public function invoice()
{
    return $this->hasOne(Invoice::class);
}


}