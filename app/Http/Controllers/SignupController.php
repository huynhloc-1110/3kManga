<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;/*PROTECT PASSWORD*/



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
        $user = new User();
        $user->name = $request ->name;
        $user->email = $request ->email;
        $user->password = Hash::make($request ->password);
    }

}
