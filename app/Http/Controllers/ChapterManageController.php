<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //for delete files in storage
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Image;

class ChapterManageController extends Controller
{
    public function showChapters($mangaId) {
        $manga = Manga::findOrFail($mangaId);
        $chapters = Chapter::where('manga_id', $mangaId)->paginate(8);

        return view("admins.chapter-manage", compact('manga', 'chapters'));
    }

    public function showCreateView($mangaId) {
        $manga = Manga::findOrFail($mangaId);
        
        return view("admins.chapter-create", compact('manga'));
    }

    public function createChapter(Request $request, $mangaId) {
        //check validation, redirect to the current page if fails
        $request->validate([
            'name'=>'required|min:1|max:50'
        ]);

        //if pass validation test, using ORM to make a new chapter in the database
        $chapter = new Chapter();
        $chapter->name = $request->input('name');
        $chapter->manga_id = $mangaId;
        $chapter->save();

        //get images from request, store it in the storage, store the path to the database
        //and save
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $count = 1;
            foreach ($images as $image) {
                $image->storeAs('public/images', 'image-'.$chapter->id.'-'.$count.'.png');
                $path = 'storage/images/'.'image-'.$chapter->id.'-'.$count.'.png';
                $currentImage = new Image();
                $currentImage->url = $path;
                $currentImage->chapter_id = $chapter->id;
                $count++;
                $currentImage->save();
            }
        }
        
        return redirect("admin-chapter-$mangaId");
    }

    public function showUpdateView($id) {
        $chapter = Chapter::findOrFail($id);
        $manga = Manga::findOrFail($chapter->manga_id);

        return view('admins.chapter-update', compact('chapter', 'manga'));
    }

    public function updateChapter(Request $request, $id) {
        //find chapter by id
        $chapter = Chapter::findOrFail($id);

        //check validation, redirect to the current page if fails
        $request->validate([
            'name'=>'required|min:1|max:50'
        ]);

        //if pass validation test, using ORM to update chapter in the database
        $chapter->name = $request->input('name');
        $chapter->save();
        
        //if the request has uploaded image, delete old ones and add new ones
        if ($request->hasFile('images')) {
            //delete old chapter images
            $oldImages = $chapter->images;
            foreach ($oldImages as $image) {
                $parts = explode("/", $image->url);
                $imageName = $parts[2];
                $imagePath = "public/images/$imageName";
                if (Storage::exists($imagePath))
                    Storage::delete($imagePath);
                $image->delete();
            }

            //add new images
            $images = $request->file('images');
            $count = 1;
            foreach ($images as $image) {
                $image->storeAs('public/images', 'image-'.$chapter->id.'-'.$count.'.png');
                $path = 'storage/images/'.'image-'.$chapter->id.'-'.$count.'.png';
                $currentImage = new Image();
                $currentImage->url = $path;
                $currentImage->chapter_id = $chapter->id;
                $count++;
                $currentImage->save();
            }
        }

        return redirect("admin-chapter-$chapter->manga_id");
    }

    public function deleteChapter($id) {
        //find chapter by id
        $chapter = Chapter::findOrFail($id);

        //delete chapter images in storage
        $images = $chapter->images;
        foreach ($images as $image) {
            $parts = explode("/", $image->url);
            $imageName = $parts[2];
            $imagePath = "public/images/$imageName";
            if (Storage::exists($imagePath))
                Storage::delete($imagePath);
        }

        //delete chapter from database
        $chapter->delete();

        return redirect()->back();
    }
}
