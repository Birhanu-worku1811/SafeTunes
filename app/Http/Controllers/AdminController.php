<?php

namespace App\Http\Controllers;

use App\Mail\NewAdmin;
use App\Models\Admin;
use App\Models\Album;
use App\Models\Music;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Activitylog\Models\Activity;


class AdminController extends Controller
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

        return redirect()->back()->with('error', 'Login details are not valid!');
    }

    public function dashboard()
    {
        $threeDaysAgo = Carbon::now()->subDays(3);
        $users = User::where('created_at', '>=', $threeDaysAgo)->get();
        $musics = Music::where('created_at', '>=', $threeDaysAgo)->get();
        $albums = Album::where('created_at', '>=', $threeDaysAgo)->get();
        $news = News::where('created_at', '>=', $threeDaysAgo)->get();
        $pageTitle = 'Dashboard';
        return view('admin.dashboard', compact('users', 'musics', 'albums', 'news', 'pageTitle'));
    }

    public function usersIndex()
    {
        $users = User::paginate(4);
        $pageTitle = 'Users';
        return view('admin.users.index', compact('users', 'pageTitle'));
    }

    public function usersUpdate(Request $request, $id)
    {
//        dd($request->role);
        $already_admin = Admin::where('email', $request->email)->first();
        if ($request->role == 'admin' && !$already_admin){
            $user = User::findOrFail($id);
            $admin = Admin::make([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
            ]);
            $admin->save();
            Mail::to($user->email)->send(new NewAdmin($user));
            activity()
                ->performedOn($user)
                ->causedBy(auth()->user()) // Assuming you have user authentication
                ->withProperties(['role_changed_to' => 'admin'])
                ->log('User role changed to admin');

            return redirect()->route('admin.users.index')->with('success', "User $user->name is now an admin");
        }
        return redirect()->route('admin.users.index')->with('error', 'something went wrong!');
    }

    public function adminsIndex()
    {
        $admins = Admin::paginate(10);
        $pageTitle = 'Admins';
        return view('admin.admins', compact('admins', 'pageTitle'));
    }

    public function activities()
    {
        $logs = Activity::all()->toArray();
        return view('admin.activity_log', compact('logs'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/'); // Redirect to the desired page after logout
    }

}
