<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Manga;

class MangaController extends Controller
{
    public function showChapters($id) {
        //get information related to the current manga and its chapters
        $chapters = Chapter::where('manga_id', $id)->get();
        $manga = Manga::find($id);
        $genres = Manga::find($id)->genres()->get();

        return view('manga',compact('chapters','manga','genres'));
    }
    
}