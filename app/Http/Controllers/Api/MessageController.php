<?php

namespace App\Http\Controllers\Api;

use App\Events\SendSms;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request){
        try {
            $request->validate([
                'phone' => 'required|numeric|between:61000000,65999999',
                'message' => 'required|string'
            ]);
            $message = Message::create([
                'user_id' => Auth::id(),
                'phone' => $request->phone,
                'message' => $request->message
            ]);
            $channel_name = Auth::user()->app->channel_name;
            event(new SendSms($message, $channel_name));
            return response()->json(['status' => true], 201);
        }
        catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
