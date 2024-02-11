<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'musics';
        $musics = Music::paginate(10);
        return view('music.index', compact(['pageTitle', 'musics']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'create music';
        return view('music.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);

        $artistId = Auth::user()->artist_id;
//        dd($userID);
//        dd($file->getSize());
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'instrument' => 'required|string|max:255',
            'band_name' => 'required|string|max:255',
            'music_file' => 'required|mimes:mp3,wav,mp4,mov,ogg|max: 102400',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

//        dd($file->getClientOriginalName());

        // Uploading the music file
        if ($request->hasFile('music_file') && $request->file('music_file')->isValid()) {
//            dd('valid file');
            $file = $request->file('music_file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/music'), $fileName);

            if ($request->hasFile('thumbnail')) {
                $coverImage = $request->file('thumbnail');
                $coverImageName = 'uploads/music/covers/'.time() . '_' . $coverImage->getClientOriginalName();
                $coverImage->move(public_path('uploads/music/covers'), $coverImageName);
            }

            // Create a new Music record in the database
            $music = Music::create([
                'title' => $request->title,
                'genre' => $request->genre,
                'instrument' => $request->instrument,
                'band_name' => $request->band_name,
                'music_file' => 'uploads/music/'.$fileName,
                'artist_id' =>$artistId,
                'thumbnail' => $coverImageName ?? null,
            ]);

            return redirect()->route('music.show', ['music'=>$music->id])->with('success', 'Music uploaded successfully!');
        }

        return back()->with('error', 'Failed to upload music. Please try again.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $music = Music::findOrFail($id);
        $pageTitle = 'Music-'.$music->title;
//        dd($music);
        return view('music.show', [
            'music'=>Music::findOrFail($id)
        ], compact('pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $music = Music::findOrFail($id);
        $pageTitle = 'Music-'.$music->title.'edit';

        return view('music.edit', [
            'music' => $music,
        ], compact('pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'instrument' => 'required|string|max:255',
            'band_name' => 'required|string|max:255',
            'music_file' => 'sometimes|mimes:mp3,wav,mp4,mov,ogg|max:4098', // Adjust the max file size as needed
        ]);

        $music = Music::findOrFail($id);

        $music->title = $request->title;
        $music->genre = $request->genre;
        $music->instrument = $request->instrument;
        $music->band_name = $request->band_name;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = 'uploads/music/covers/'.time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/music/covers/'), $imageName);
            $music->thumbnail = $imageName;
        }

        if ($request->hasFile('music_file') && $request->file('music_file')->isValid()) {
            $file = $request->file('music_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/music'), $fileName);
            $music->file_path = 'uploads/music/' . $fileName;
        }

        $music->save();

        return redirect()->route('music.show', $id)->with('success', 'Music updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $music = Music::findOrFail($id);

        // Delete associated file if exists
//        if (file_exists(public_path($music->file_path))) {
//            unlink(public_path($music->file_path));
//        }

        $music->delete();

        return redirect()->route('music.index')->with('success', 'Music deleted successfully!');
    }
}
