<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\home\Contact;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class ContactController extends Controller
{
    public function index()
    {
        $pageTitle = 'contact';
        return view('home.contact', compact('pageTitle'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        Contact::create($request->all());
        return redirect()->back()->with("success", "Message sent successfully, thank you!");
    }

}
