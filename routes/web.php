<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('accounts.login');
});
Route::get('/signup', function () {
    return view('accounts.signup');
});
Route::get('/admin', function () {
<<<<<<< HEAD
    return view('admin.account-manage');
=======
    return view('admins.login');
>>>>>>> 2890c94c7a900a2aa558f92a63901cd43b472cf8
});