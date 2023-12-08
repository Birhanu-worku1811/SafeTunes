<?php

namespace App\Http\Middleware;

use App\Models\Album;
use App\Models\Music;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AlbumMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->artist_id===null){
            abort(401);
        }
        if ($request->isMethod('delete') || $request->isMethod('put')){
            $albumId = $request->route('music');
            if (!$this->isOwner($albumId)){
                abort(401);
            }
        }
        return $next($request);
    }

    public function isOwner($id): bool
    {
        $album = Album::findOrFail($id);
        return $album->artist_id === Auth::user()->id;
    }
}
