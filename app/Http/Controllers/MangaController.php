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
        $manga = Manga::find($id);

        //if no manga of that id was found, go to 404 page
        if (is_null($manga)) return abort(404);

        $genres = Manga::find($id)->genres()->get();
        $chapters = Chapter::where('manga_id', $id)->get();

        $attached = null;
        if (!is_null(session('user-info'))) {
            $user_id = session('user-info')->id;
            $attached = $manga->users()->exists($user_id);
        }

        return view('manga', compact('chapters','manga','genres', 'attached'));
    }
    
    public function follow($id) {
        $user = session('user-info');
        $user->mangas()->attach($id);
        return back();
    }

    public function unfollow($id) {
        $user = session('user-info');
        $user->mangas()->detach($id);
        return back();
    }
}