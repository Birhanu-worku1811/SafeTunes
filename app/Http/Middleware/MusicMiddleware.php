<?php

namespace App\Http\Middleware;

use App\Models\Music;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MusicMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        dd(Auth::user());
        if (!Auth::check() || Auth::user()->artist_id===null){
//            dd('here');
            abort(401);
        }
        if ($request->isMethod('delete') || $request->isMethod('put')){
//            dd('here');
            $musicId = $request->route('music');
            if (!$this->isOwner($musicId)){
                abort(401);
            }
        }
//        dd("there");

        return $next($request);
    }

    public function isOwner($id): bool
    {
        $music = Music::findOrFail($id);
        return $music->artist_id === Auth::user()->id;
    }
}
