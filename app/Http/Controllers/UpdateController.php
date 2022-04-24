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
        $updates = DB::table('chapters')
            ->crossJoin('mangas')
            ->crossJoin('users')
            ->crossJoin('manga_user')
            ->select('chapters.id', 'chapters.name', 'chapters.updated_at', 'manga_user.manga_id', 'mangas.name as manga_name', 'mangas.cover_url')
            ->where('chapters.manga_id', DB::raw('mangas.id'))
            ->where('manga_user.manga_id', DB::raw('mangas.id'))
            ->where('manga_user.user_id', DB::raw('users.id'))
            ->where('users.id', $user->id)
            ->where('mangas.name', 'like', '%'.$search.'%')
            ->orderBy('updated_at', 'desc')
            ->paginate(8);

        $updates->appends(['search' => $search]);

        return view('users.update', compact('updates'));
    }
}
