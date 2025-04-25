<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminLogin extends Authenticatable {
    protected $table = 'admin_logins';
    protected $fillable = ['username', 'password'];
    protected $hidden = ['password'];
}