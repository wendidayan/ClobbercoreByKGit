<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    //
    use HasFactory;

    // Define fillable fields if you're using mass assignment
    protected $fillable = [
        'user_id',
        'street',
        'barangay',
        'city',
        'province',
        'region',
        'zip_code',
        'phone_number',
        'is_default',
    ];

    // Define the relationship to the User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
