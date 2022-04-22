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
use \App\Http\Controllers\ChapterController;
use \App\Http\Controllers\SignupController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\LibraryController;
use App\Http\Controllers\UpdateController;
use App\Http\Middleware\RoleCheck;

//both role
Route::get('/', [HomeController::class, 'showMangas']);

Route::get('/manga-{id}', [MangaController::class, 'showChapters']);

Route::get('/chapter-{id}', [ChapterController::class, 'showImages']);

Route::get('/signup', [SignupController::class, 'signupView']);
Route::post('/signup-submit', [SignupController::class, 'signupSubmit']);

Route::get('/login', [LoginController::class, 'loginView']);
Route::post('/login-submit', [LoginController::class, 'authenticate']);

//roles
Route::middleware(['auth'])->group(function(){
    //user
    Route::get('/profile', [UserController::class, 'showUserInfo']);
    Route::post('/change-profile', [UserController::class, 'changeProfile']);
    Route::get('/logout', [UserController::class, 'logOut']);

    Route::get('/follow-{id}', [MangaController::class, 'follow']);
    Route::get('/unfollow-{id}', [MangaController::class, 'unfollow']);

    Route::get('/library', [LibraryController::class, 'showMangas']);
    Route::get('/update', [UpdateController::class, 'showUpdates']);

    //admin
    Route::middleware('role:admin')->group(function() {
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
    });
});

//other
Route::get('/unauthorize', function () {
    return view('errors.unauthorize');
})->name('unauthorize');
Route::get('/admin-required', function () {
    return view('errors.admin-required');
})->name('admin-required');
