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
        //check validation, redirect to the current page if fails
        $request->validate([
            'name'=>'required|min:1|max:50',
            'author'=>'required|min:1|max:50',     
        ]);

        //if pass validation test, using ORM to make a new manga in the database
        $manga = new Manga();
        $manga->name = $request->input('name');
        $manga->author = $request->input('author');
        $manga->description = $request->input('description');
        $manga->cover_url = "dist/img/one_piece.jpg";
        $manga->save();

        //get cover from request, store it in the storage, store the path to the database
        //and save
        if ($request->hasFile('cover')) {
            $request->cover->storeAs('public/mangas', 'manga-'.$manga->id.'.png');
            $path = 'storage/mangas/'.'manga-'.$manga->id.'.png';
            $manga->cover_url = $path;
        }
        $manga->save();

        //attach genres to the current manga
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
    
    //update manga controller

    public function showUpdateView($id) {
        $manga = Manga::findOrFail($id);
        return view('admins.manga-update', compact('manga'));
    }

    public function updateManga(Request $request, $id) {
        $manga = Manga::findOrFail($id);
        $manga->name = $request->input('name');
        $manga->author = $request->input('author');
        $manga->description = $request->input('description');
        $manga->cover_url = "dist/img/one_piece.jpg";
        $manga->save();

        //get cover from request, store it in the storage, store the path to the database
        //and save
        if ($request->hasFile('cover')) {
            $request->cover->storeAs('public/mangas', 'manga-'.$manga->id.'.png');
            $path = 'storage/mangas/'.'manga-'.$manga->id.'.png';
            $manga->cover_url = $path;
        }
        $manga->save();

        
        return redirect('/admin-manga');

    }

}
