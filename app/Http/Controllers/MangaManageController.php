<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manga;

class MangaManageController extends Controller
{
    public function showMangas(){
        $mangas = Manga::all();

        return view('admins.manga-manage', compact('mangas'));
    }
    public function showCreateView() {
        return view('admins.manga-create');
    }
}
