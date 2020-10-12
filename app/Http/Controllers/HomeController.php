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
}
