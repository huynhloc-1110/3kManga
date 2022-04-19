<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class HomeController extends Controller
{
    public function showMangas() {
        $mangas = Manga::all();
        return view('home', compact('mangas'));
    }
}
