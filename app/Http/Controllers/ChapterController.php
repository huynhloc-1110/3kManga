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
        //get information related to the current chapter and its images
        $chapter = Chapter::find($id);

        //if no chapter of that id was found, go to 404 page
        if (is_null($chapter)) return abort(404);

        $images = Image::where('chapter_id', $id)->get();
        $manga = Manga::find($chapter->manga_id);

        //get next and previous chapter id of this manga
        $thisMangaId = $manga->id;
        $next = Chapter::where('manga_id', $thisMangaId)->where('id', '>', $id)->min('id');
        $previous = Chapter::where('manga_id', $thisMangaId)->where('id', '<', $id)->max('id');

        return view('chapter', compact('images', 'chapter', 'manga', 'next', 'previous'));
    }
}
