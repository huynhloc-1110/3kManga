<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class HomeController extends Controller
{
    public function showMangas(Request $request) {
        $search = $request->input('search');
        if (isset($search)) {
            $mangas = Manga::where('name', 'like', '%'.$search.'%')->get();
        }
        else {
            $mangas = Manga::all();
        }
        return view('home', compact('mangas'));
    }
}
