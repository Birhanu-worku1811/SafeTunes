<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::paginate(10);
        $pageTitle = 'albums';
        return view('album.index', compact('pageTitle', 'albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Album - create";
        return view('album.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd(Auth::user()->artist_id);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'release_date' =>'required|date',
            'audio_files.*' => 'required|mimes:mp3,wav,ogg',
        ]);

        $coverImage = $request->file('cover_image');
        $coverImageName = 'uploads/albums/covers/'.time() . '_' . $coverImage->getClientOriginalName();
        $coverImage->move(public_path('uploads/albums/covers'), $coverImageName);


        $album = Album::create([
            'title' => Crypt::encrypt($validatedData['title']),
            'description' => $validatedData['description'],
            'cover_image' => $coverImageName,
            'release_date' => $validatedData['release_date'],
            'artist_id' => Auth::user()->artist_id,
        ]);

        if ($request->hasFile('audio_files')) {
            foreach ($request->file('audio_files') as $audioFile) {
                $audioFileName = $audioFile->getClientOriginalName();

                $musicTitle = pathinfo($audioFileName, PATHINFO_FILENAME);
//                dd($musicTitle);

                $audioFileName = time() . '_' . $audioFile->getClientOriginalName();
//                dd($audioFileName);
                $audioFile->move(public_path('uploads/music'), $audioFileName);

                // Create a music record for each audio file associated with the album
                Music::create([
                    'album_id' => $album->id,
                    'music_file' => 'uploads/music/'.$audioFileName,
                    'artist_id' => Auth::user()->artist_id,
                    'title' =>$musicTitle
                ]);
            }
        }

        return redirect()->route('album.show', $album)->with('success', 'Album created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);
        $pageTitle = 'Album - '.$album->title;
        return view('album.show', compact('album'), compact('pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $pageTitle = 'Edit - ' . $album->title;
        return view('album.edit', compact('album', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'release_date' =>'required|date',
            'audio_files.*' => 'required|mimes:mp3,wav,ogg',
        ]);

        $validatedData['title'] = Crypt::encrypt($validatedData['title']);

        $album = Album::findOrFail($id);

        // Handle image update if provided
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = 'uploads/albums/covers/'.time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/albums/covers/'), $imageName);

            $validatedData['cover_image'] = $imageName;
        }

        $album->update($validatedData);

        return redirect()->route('album.show', $album->id)->with('success', 'Album updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }
}
