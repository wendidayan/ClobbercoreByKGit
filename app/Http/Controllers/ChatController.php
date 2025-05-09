<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use App\Models\AdminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function getMessages(Request $request)
    {
        $userType = $request->user_type;
        $userId = $request->user_id;

        $messages = Messages::where(function($query) use ($userType, $userId) {
            $query->where('sender_type', $userType)
                  ->where('sender_id', $userId)
                  ->orWhere('receiver_type', $userType)
                  ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = Messages::create([
            'sender_id' => $request->sender_id,
            'sender_type' => $request->sender_type,
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'message' => $request->message,
            'is_read' => false
        ]);

        // Broadcast the message
        //broadcast(new \App\Events\NewMessage($message))->afterCommit();
        broadcast(new \App\Events\NewMessage($message));
        
        return response()->json(['message' => $message]);
    }

    public function getUsers()
    {

        $users = User::select('id', 'fullname', 'username')->get();
        return response()->json($users);
    }

    public function markAsRead(Request $request)
    {
        Messages::where('sender_id', $request->sender_id)
               ->where('sender_type', $request->sender_type)
               ->where('receiver_id', $request->receiver_id)
               ->where('receiver_type', $request->receiver_type)
               ->where('is_read', false)
               ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
}
