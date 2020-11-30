<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function projects(){
        $users = User::whereNull('password')->where('type', 'project')->orderBy('name')->get();
        $apps = User::where('type', 'app')->get();
        return view('users.projects', compact('users', 'apps'));
    }

    public function apps(){
        $users = User::whereNull('password')->where('type', 'app')->orderBy('name')->get();
        return view('users.apps', compact('users'));
    }

    public function store(Request $request){
        try {
            $token = Str::random(60);
            User::create([
                'app_id' => $request->type == 'project' ? $request->app_id : null,
                'name' => $request->name,
                'token' => $token,
                'type' => $request->type,
                'channel_name' => $request->type == 'app' ? User::strRandom(5) : null,
                'api_token' => hash('sha256', $token),
            ]);
            return redirect()->back()->with(['success' => 'Proýekt üstünlikli goşuldy.']);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function update(Request $request, User $user){
        try {
            $user->update([
                'app_id' => $user->type == 'project' ? $request->app_id : null,
                'name' => $request->name,
            ]);
            return redirect()->back()->with(['success' => 'Proýekt üstünlikli üýtgedildi.']);
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
