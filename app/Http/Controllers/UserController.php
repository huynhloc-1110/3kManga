<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUserInfo(){
        $user = session('user-info');
        return view('users.profile', compact('user'));
    }

    public function changeProfile(Request $request) {
        $user = session('user-info');
        if ($request->hasFile('avatar')) {
            $request->avatar->storeAs('public/avatars', 'user-'.$user->id.'.png');
            $path = 'storage/avatars/'.'user-'.$user->id.'.png';
            $user->avatar_url = $path;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return back();
    }

    public function logOut(Request $request) {
        Auth::logout();

        //flush session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
