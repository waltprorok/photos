<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999',

        ]);
        // Get filename with extension
        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just the filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Create new filename
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        // Upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $fileNameToStore);

        // Create album
        $album = new Album;

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;

        $album->save();
        return redirect('/albums')->with('success', 'Album Created');


    }
}
