<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Image;
use App\Models\Manga;


class ChapterController extends Controller
{
    public function showImages($id){
        $images = Image::where('chapter_id', $id)->get();
        $chapter = Chapter::find($id);
        $manga = Manga::find($chapter->manga_id);

        return view('chapter', compact('images', 'chapter', 'manga'));
    }
}
