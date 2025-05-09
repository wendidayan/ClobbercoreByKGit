<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;
use App\Models\AdminLogin;

/*Broadcast::channel('private-chat', function ($user) {
    return Auth::check();  // Only authenticated users can join this channel
});

Broadcast::channel('App.Models.User.{id}', function ($authUser, $id) {
    // Allow if the authenticated user is the same as the {id} in the channel
    return $authUser instanceof User && (int) $authUser->id === (int) $id;
});

Broadcast::channel('App.Models.AdminLogin.{id}', function ($authUser, $id) {
    // Allow if the authenticated admin is the same as the {id} in the channel
    return $authUser instanceof AdminLogin && (int) $authUser->id === (int) $id;
});*/

/*Broadcast::channel('chat.{type}.{id}', function ($authUser, $type, $id) {
    // This will check if the authenticated user is the same as the {id} in the channel
    // and ensures the type matches either 'user' or 'adminlogin'
    return $authUser->id == $id && strtolower(class_basename($authUser)) === $type;
});

// Specific channel for admin login
Broadcast::channel('chat.adminlogin.{id}', function ($adminUser, $id) {
    // Ensure the authenticated user is an admin and their id matches
    return $adminUser instanceof AdminLogin && $adminUser->id == $id;
});

// Specific channel for regular users
Broadcast::channel('chat.user.{id}', function ($user, $id) {
    // Ensure the authenticated user is a regular user and their id matches
    return $user instanceof User && $user->id == $id;
});*/

Broadcast::channel('private-chat.{userId}', function ($user, $userId) {
    // For admin users
    if (auth('admin')->check()) {
        return (string) $user->id === (string) $userId;
    }

    // For regular users
    if (auth()->check()) {
        return (string) $user->id === (string) $userId;
    }

    return false;
});