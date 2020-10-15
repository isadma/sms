<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        $messagesAll = Message::count();
        $messagesToday = Message::whereDate('created_at', Carbon::today())->count();
        $users = User::where('type', '<>', 'app')->get();
        return view('dashboard', compact('users', 'messagesAll', 'messagesToday'));
    }
}
