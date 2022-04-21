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

    public function logOut(Request $request) {
        Auth::logout();

        //flush session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
