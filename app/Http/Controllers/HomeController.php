<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $messagesAll = Message::count();
        $messagesToday = Message::whereDate('created_at', Carbon::today())->count();
        $users = User::all();
        return view('dashboard', compact('users', 'messagesAll', 'messagesToday'));
    }

    public function conf(){
        return response()->json([
            'success' => true,
            'conf' => [
                "PUSHER_APP_ID" => env('PUSHER_APP_ID'),
                "PUSHER_APP_KEY" => env('PUSHER_APP_KEY'),
                "PUSHER_APP_CLUSTER" => env('PUSHER_APP_CLUSTER'),
                "HOST" => request()->server('SERVER_ADDR'),
                "PORT" => (int) env('PUSHER_PORT'),
                "ENCRYPTED" => true,
                "CHANNEL" => "sms",
                "EVENT" => ".sms.created",
            ]
        ], 200);
    }
}
