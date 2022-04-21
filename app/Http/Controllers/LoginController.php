<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView(Request $request) {
        return view('login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:14',
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'email' => 'Incorrect login credentials.'
        ])->onlyInput('email');
    }
}
