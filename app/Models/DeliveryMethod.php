<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryMethod extends Model
{
    //

    use HasFactory;

    protected $fillable = ['name'];


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, foreignKey: 'delivery_method_id');
    }
}
