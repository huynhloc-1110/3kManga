<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView() {
        return view('login');
    }

    public function authenticate(Request $request) {
        //validate first
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:14',
        ]);

        //check login credentials with database
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            
            //put authenticated user info into session for later use in views
            session(['user-info' => Auth::user()]);

            //redirect to home view
            return redirect()->intended('/');
        }
        
        //if login credentials is inccorect, return to login view with login errors and email input
        return back()->withErrors([
            'login' => 'Incorrect login credentials.'
        ])->onlyInput('email');
    }
}
