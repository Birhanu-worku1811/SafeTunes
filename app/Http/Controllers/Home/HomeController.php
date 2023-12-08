<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Music;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'home';
        $news = News::paginate(4);
        $albums = Album::paginate(4);
        $artists = Artist::paginate(4);
        $musics = Music::paginate(4);

        return view('home.index', compact('pageTitle', 'news', 'albums', 'artists', 'musics'));
    }
}
