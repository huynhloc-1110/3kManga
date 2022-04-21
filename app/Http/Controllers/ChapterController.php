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
        $images = Image::where('chapter_id', $id)->get();
        $chapter = Chapter::find($id);
        $manga = Manga::find($chapter->manga_id);

        //get next and previous chapter id
        $next = Chapter::where('id', '>', $id)->min('id');
        $previous = Chapter::where('id', '<', $id)->max('id');

        return view('chapter', compact('images', 'chapter', 'manga', 'next', 'previous'));
    }
}
