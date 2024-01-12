<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Music;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search_results(Request $request)
    {
        $search = $request->input('search');
        $pageTitle = 'Search | ' . $search . ' | Results';

        $albums = Album::where('title', 'LIKE', '%' . $search . '%')->paginate(4);
        $artists = Artist::where('name', 'LIKE', '%' . $search . '%')->paginate(4);
        $musics = Music::where('title', 'LIKE', '%' . $search . '%')->paginate(4);
        return view("home.search-results", compact('pageTitle', 'artists', 'albums', 'musics', 'search'));
    }
}
