<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function loginForm()
    {
//        dd('are you admin?');
        return view('admin.login');
    }

    public function login(Request $request)
    {
//        dd('hey');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $credentials = $request->only('email', 'password');
//        dd($credentials);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended("/home")->with('success', 'Signed in');
        }

        return redirect()->route('admin-auth.login-form')->with('error', 'Login details are not valid!');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::paginate(10);
        $pageTitle = 'Users';
        return view('admin.users', compact('users', 'pageTitle'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/'); // Redirect to the desired page after logout
    }

}
