<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $pageTitle = 'about';
        return view('home.about', compact('pageTitle'));
    }
}
