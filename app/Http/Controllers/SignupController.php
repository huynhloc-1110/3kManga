<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;



class SignupController extends Controller
{
    public function signup(){
        return view('users.signup');
    }

    public function signupUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:14',
        ]);

    }

}
