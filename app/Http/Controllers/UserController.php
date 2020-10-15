<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function projects(){
        $users = User::whereNull('password')->where('type', 'project')->orderBy('name')->get();
        return view('users.projects', compact('users'));
    }

    public function apps(){
        $users = User::whereNull('password')->where('type', 'app')->orderBy('name')->get();
        return view('users.apps', compact('users'));
    }

    public function store(Request $request){
        try {
            $token = Str::random(60);
            User::create([
                'name' => $request->name,
                'token' => $token,
                'type' => $request->type,
                'api_token' => hash('sha256', $token),
            ]);
            return redirect()->back()->with(['success' => 'Proýekt üstünlikli goşuldy.']);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function destroy(User $user){
        try {
            $user->tokens()->delete();
            $user->delete();
            return redirect()->back()->with(['success' => 'Proýekt üstünlikli pozuldy.']);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
