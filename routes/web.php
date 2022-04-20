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

use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\MangaController;
use \App\Http\Controllers\SignupController;

//both role
Route::get('/', [HomeController::class, 'showMangas']);

Route::get('/manga-{id}', [MangaController::class, 'showChapters']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/chapter', function () {
    return view('chapter');
});

//user
Route::get('/signup',[SignupController::class, 'signup']);


Route::get('/profile', function () {
    return view('users.profile');
});
Route::get('/update', function () {
    return view('users.update');
});
Route::get('/library', function () {
    return view('users.library');
});

//admin
Route::get('/admin-account', function () {
    return view('admins.account-manage');
});
Route::get('/admin-manga', function () {
    return view('admins.manga-manage');
});
Route::get('/admin-chapter', function () {
    return view('admins.chapter-manage');
});
Route::get('/admin-profile', function () {
    return view('admins.profile');
});

//other
Route::get('/unauthorize', function () {
    return view('errors.unauthorize');
});