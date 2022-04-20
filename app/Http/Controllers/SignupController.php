<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;/*PROTECT PASSWORD*/


class SignupController extends Controller
{
    public function signupView(){
        return view('users.signup');
    }

    public function signupUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:14',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->role = "user";
        $user->avatar_url = "dist/img/guest.png";
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $success = $user->save();
        return view('users.signup')->with('success', $success);
    }

}
