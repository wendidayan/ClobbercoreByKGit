<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class AdminLogin extends Authenticatable {
    use HasFactory, Notifiable;

    protected $table = 'admin_logins';
    protected $fillable = ['username', 'password'];
    protected $hidden = ['password'];

    public function sentChats() {
        return $this->morphMany(Messages::class, 'sender');
    }
    public function receivedChats() {
        return $this->morphMany(Messages::class, 'receiver');
    }
}