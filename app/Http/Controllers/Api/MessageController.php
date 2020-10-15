<?php

namespace App\Http\Controllers\Api;

use App\Events\SendSms;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request){
        try {
            return 1;
            $request->validate([
                'phone' => 'required|numeric|between:61000000,65999999',
                'message' => 'required|string'
            ]);
            $message = Message::create([
                'user_id' => Auth::id(),
                'phone' => $request->phone,
                'message' => $request->message
            ]);
            event(new SendSms($message));
            return response()->json(['status' => true], 201);
        }
        catch (\Exception $e){
            return response()->json(['status' => false, $e->getMessage()], 500);
        }
    }
}
