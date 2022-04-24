<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function showMangas(Request $request) {
        //get search input from request
        $search = $request->input('search');

        $user = session('user-info');

        //check if user search for anything
        //if yes, filter the manga list
        //if no, get all the manga in the database
        if (!isset($search)) {
            $mangas = $user->mangas()->orderBy('updated_at')->paginate(8);
        }
        else {
            $mangas = $user->mangas()->where('name', 'like', '%'.$search.'%')->orderBy('updated_at','desc')->paginate(8);
            $mangas->appends(['search' => $search]);
        }
        return view('home', compact('mangas'));
    }
}
