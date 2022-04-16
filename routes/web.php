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
    return view('admins.login');
});
Route::get('/admin-account', function () {
    return view('admins.account-manage');
});
Route::get('/admin-manga', function () {
    return view('admins.manga-manage');
});