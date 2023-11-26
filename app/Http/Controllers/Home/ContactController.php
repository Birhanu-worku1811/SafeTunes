<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $pageTitle = 'contact';
        return view('home.contact', compact('pageTitle'));
    }

}
