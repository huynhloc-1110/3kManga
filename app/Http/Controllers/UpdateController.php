<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function showUpdates(Request $request) {
        //get search input from request
        $search = $request->input('search');

        //get user info from session
        $user = session('user-info');

        //get updates by using sql
        $updates = DB::select('SELECT chapters.id, chapters.name, chapters.updated_at, manga_user.manga_id, mangas.name as manga_name, mangas.cover_url FROM chapters, mangas, users, manga_user WHERE chapters.manga_id = mangas.id and manga_user.manga_id = mangas.id and manga_user.user_id = users.id and users.id = :id and mangas.name LIKE :search ORDER BY updated_at DESC', ['id' => $user->id, 'search' => '%'.$search.'%']);
        
        return view('users.update', compact('updates'));
    }
}
