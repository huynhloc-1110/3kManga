<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Genre;

class MangaManageController extends Controller
{
    public function showMangas(){
        $mangas = Manga::all();

        return view('admins.manga-manage', compact('mangas'));
    }
    public function showCreateView() {
        $genres = Genre::all();
        return view('admins.manga-create', compact('genres'));
    }
    public function createManga(Request $request) {
        $request->validate([
            'name'=>'required|min:1|max:50',
            'author'=>'required|min:1|max:50',     
        ]);
        $manga = new Manga();
        $manga->name = $request->input('name');
        $manga->author = $request->input('author');
        $manga->description = $request->input('description');
        if ($request->hasFile('cover')) {
            $request->cover->storeAs('public/mangas', 'manga-'.$manga->name.'.png');
            $path = 'storage/mangas/'.'manga-'.$manga->name.'.png';
            $manga->cover_url = $path;
        }
        $manga->save();
        if ($request->input('genre-1') != 'Select category') {
            $manga->genres()->attach($request->input('genre-1'));
        }
        if ($request->input('genre-2') != 'Select category') {
            $manga->genres()->attach($request->input('genre-2'));
        }
        if ($request->input('genre-3') != 'Select category') {
            $manga->genres()->attach($request->input('genre-3'));
        }
        

        return redirect('/admin-manga');

    }

}
