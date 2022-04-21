<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;/*PROTECT PASSWORD*/


class SignupController extends Controller
{
    public function signupView(){
        return view('signup');
    }

    public function signupSubmit(Request $request){
        //check validation, redirect to the current page if fails
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:14',
        ]);

        //if pass validation test, using ORM to make a new user in the database
        $user = new User();
        $user->name = $request->input('name');
        $user->role = "user";
        $user->avatar_url = "dist/img/guest.png";
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        //notify view if the database saving process is successful or not
        $success = $user->save();
        return view('signup')->with('success', $success);
    }

}
