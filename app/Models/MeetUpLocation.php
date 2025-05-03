<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MeetUpLocation extends Model
{
    //
    use HasFactory;

    protected $fillable = ['city', 'landmark'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'meetup_location_id');
    }
}
