<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Manga;

class MangaController extends Controller
{
    public function showChapters($id) {
        $chapters = Chapter::where('manga_id', $id)->get();
        $manga = Manga::find($id);

        return view('manga',compact('chapters','manga'));
    }
    
}