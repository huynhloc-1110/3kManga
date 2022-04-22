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

        //check if the manga is followed by the current (if-exist) user
        $attached = null;
        if (!is_null(session('user-info'))) {
            $user_id = session('user-info')->id;
            $attached = $manga->users()->where('user_id', $user_id)->exists();
        }

        return view('manga', compact('chapters','manga','genres', 'attached'));
    }
    
    public function follow($id) {
        //get the user from session
        //and attach the current manga to it through n-to-n relationship
        $user = session('user-info');
        $user->mangas()->attach($id);
        return back();
    }

    public function unfollow($id) {
        //get the user from session
        //and detach the current manga from it through n-to-n relationship
        $user = session('user-info');
        $user->mangas()->detach($id);
        return back();
    }
}