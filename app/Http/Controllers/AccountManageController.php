<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;/*PROTECT PASSWORD*/

class AccountManageController extends Controller
{
    public function showAccounts() {
        $users = User::all();
        return view('admins.account-manage', compact('users'));
    }

    public function showCreateView() {
        return view('admins.account-create');
    }

    public function createAccount(Request $request) {
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
        $user->save();

        return redirect('/admin-account');
    }

    public function showUpdateView($id) {
        $user = User::findOrFail($id);
        return view('admins.account-update', compact('user'));
    }

    public function updateAccount(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/admin-account');
    }

    public function deleteAccount($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin-account');
    }
}
