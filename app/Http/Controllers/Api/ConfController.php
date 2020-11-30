<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfController extends Controller
{
    public function conf(){
        if (Auth::user()->type == 'app'){
            return response()->json([
                'success' => true,
                'conf' => [
                    "PUSHER_APP_ID" => env('PUSHER_APP_ID'),
                    "PUSHER_APP_KEY" => env('PUSHER_APP_KEY'),
                    "PUSHER_APP_CLUSTER" => env('PUSHER_APP_CLUSTER'),
                    "HOST" => request()->server('SERVER_ADDR'),
                    "HOST_DOMAIN" => "pursat.com.tm",
                    "PORT" => (int) env('PUSHER_PORT'),
                    "ENCRYPTED" => true,
                    "CHANNEL" => Auth::user()->channel_name,
                    "EVENT" => ".sms.created",
                ]
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => "Unauthorized"
        ], 403);
    }
}
