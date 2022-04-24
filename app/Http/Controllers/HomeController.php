<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class HomeController extends Controller
{
    public function showMangas(Request $request) {
        //get search input from request
        $search = $request->input('search');

        //check if user search for anything
        //if yes, filter the manga list
        //if no, get all the manga in the database
        if (isset($search)) {
            $mangas = Manga::where('name', 'like', '%'.$search.'%')->paginate(2);
            $mangas->appends(['search' => $search]);
        }
        else {
            $mangas = Manga::paginate(8);
        }
        return view('home', compact('mangas'));
    }
}
