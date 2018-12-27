<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id)
    {
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'image|max:1999',

        ]);
        // Get filename with extension
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        // Get just the filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        // Create new filename
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        // Upload image
        $path = $request->file('photo')->storeAs('public/photos/' . $request->input('album_id'), $fileNameToStore);

        // Upload Photo
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title= $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $fileNameToStore;

        $photo->save();
        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }
}
