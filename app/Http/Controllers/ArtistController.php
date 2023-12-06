<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ArtistMiddleware;
use App\Models\Artist;
use App\Models\Music;
use App\Models\User;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware(ArtistMiddleware::class)->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();
        $pageTitle = "List of all artists";
        return view('artist.index', ['artists' => $artists], ['pageTitle'=>$pageTitle]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $artist = Artist::findOrFail($id); // Fetch the artist using the ID
        $pageTitle = 'Artist-'.$artist->name;

        return view('artist.profile', ['artist' => $artist], compact('pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        $pageTitle = 'Artist-'.$artist->name.'Profile-edit';

        return view('artist.edit', [
            'artist' => $artist,
        ], compact('pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' =>'required|email|unique:artists,email,' . $id,
            'bio' => 'nullable|string',
            'genre' => 'nullable|string',
            'band_name' => 'nullable|string',
            'instrument' => 'nullable|string',
        ]);

        $artist = Artist::findOrFail($id);
        $userAsArtist = User::where('artist_id', $id);

        $artist->update($validatedData);
        $userAsArtist->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        // Redirect back with a success message
        return redirect()->route('artist.show', $id)->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
