<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Genre;

class MangaManageController extends Controller
{
    public function showMangas(){
        $mangas = Manga::paginate(8);
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
            'description'=>'max:500'
        ]);

        //if pass validation test, using ORM to make a new manga in the database
        $manga = new Manga();
        $manga->name = $request->input('name');
        $manga->author = $request->input('author');
        $manga->description = $request->input('description');
        $manga->cover_url = "dist/img/cover-not-found.png";
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
        $genres = Genre::all();
        $manga = Manga::findOrFail($id);
        return view('admins.manga-update', compact('manga', 'genres'));
    }

    public function updateManga(Request $request, $id) {
        //check validation, redirect to the current page if fails
        $request->validate([
            'name'=>'required|min:1|max:50',
            'author'=>'required|min:1|max:50',
            'description'=>'max:500'
        ]);

        //if pass validation test, using ORM to update the manga in the database
        $manga = Manga::findOrFail($id);
        $manga->name = $request->input('name');
        $manga->author = $request->input('author');
        $manga->description = $request->input('description');

        //get cover from request, store it in the storage, store the path to the database
        //and save
        if ($request->hasFile('cover')) {
            $request->cover->storeAs('public/mangas', 'manga-'.$id.'.png');
            $path = 'storage/mangas/'.'manga-'.$id.'.png';
            $manga->cover_url = $path;
        }
        $manga->save();

        //dettach and attach to new genres
        $manga->genres()->detach();
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

    public function deleteManga($id) {
        $manga = Manga::findOrFail($id);
        $manga->delete();

        return redirect('/admin-manga');
    }
}
