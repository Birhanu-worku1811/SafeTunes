<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $requestedArtistId = $request->route('id');

//        dd($requestedArtistId);
//        dd(Auth::user()->id ==$requestedArtistId);

        if (Auth::check() && Auth::user()->artist_id == $requestedArtistId) {
            return $next($request);
        }

        abort(401);
    }
}
