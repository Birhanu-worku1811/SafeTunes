<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ArtistAuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
//        dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
//        dd($credentials);
        if (Auth::guard('web')->attempt($credentials)) {
//            dd($credentials);
            return redirect()->intended('artists.index')
            ->with('success', 'Signed in');
        }

//        dd('sheet');
        return redirect()->route('login')->with('error', 'Login details are not valid');
    }

    public function registrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:artists|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
//        Hashing the password
        $data['password'] = Hash::make($data['password']);

        $artist = Artist::create($data);
//        dd($artist);
        $userArtist = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>$data['password'],
            'artist_id' => $artist->id
        ]);

        if ($userArtist) {
            Auth::login($userArtist);
        }

        if ($artist) {
            return redirect()->route('artist.index')
            ->with('success', 'You have signed up as an artist');
        }

        return back()->with('error', 'Registration failed');
    }

}
