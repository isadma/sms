<?php

namespace App\Http\Controllers;

use App\Events\SendSms;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request){
        $messages = Message::query()->orderByDesc('id');
        if ($request->has('user') && $request->get('user') != 'all'){
            $messages->where('user_id', $request->get('user'));
        }
        if ($request->has('phone') && $request->get('phone') != ''){
            $messages->where('phone', $request->get('phone'));
        }
        $messages = $messages->paginate(50);
        $users = User::orderBy('name')->get();
        return view('messages.index', compact('messages', 'users'));
    }

    public function store(Request $request){
        try {
            $message = Message::create([
                'user_id' => Auth::id(),
                'phone' => $request->phone,
                'message' => $request->message
            ]);
            event(new SendSms($message));
            return redirect()->back()->with(['success' => 'SMS üstünlikli goşuldy.']);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
