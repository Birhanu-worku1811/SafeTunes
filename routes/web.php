<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\ArtistAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AlbumMiddleware;
use App\Http\Middleware\LockoutUsers;
use App\Http\Middleware\MusicMiddleware;
use App\Http\Middleware\NewsMiddleware;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => 'admin', 'middleware' => AdminMiddleware::class], function () {
    Route::get('/activities', [AdminController::class, 'activities'])->name('admin.activities');
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin-auth.login-form');
    Route::post('/login', [AdminController::class, 'login'])->name('admin-auth.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin-auth.logout');
    Route::get('/profile/{id}', function ($id) {
        return view('admin.profile', compact('id'));
    })->name('admin.profile');
    Route::group(['prefix' => 'users'], function (){
        Route::get('/', [AdminController::class, 'usersIndex'])->name('admin.users.index');
        Route::get('/{id}/edit', function ($id){
            $user = User::findOrFail($id);
            $admin = Admin::where('email', $user->email)->first();
            $isAdmin = (bool)$admin;
            $pageTitle = 'Edit User';
            return view('admin.users.edit', compact('user', 'pageTitle', 'isAdmin'));
        })->name('admin.users.edit');
        Route::put('/{id}/update',[AdminController::class, 'usersUpdate'])->name('admin.users.update');
    });
    Route::get('/admins', [AdminController::class, 'adminsIndex'])->name('admin.admins.index');
});



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Auth::routes();
Route::get('/otp-login', [LoginController::class, 'otpLoginForm'])->name('otp.loginForm');
Route::post('otp-login', [LoginController::class, 'otpLogin'])->name('otp.login');

Route::get('/about', [AboutController::class, 'index'])->name('home.about');
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('home.contact.store');
//Route::get('/news', [NewsController::class, 'index'])->name('home.contact');
Route::resource('news', NewsController::class)->middleware(NewsMiddleware::class)->only('create', 'edit', 'update', 'destroy', 'store');
Route::resource('/news', NewsController::class)->only('index', 'show');

Route::resource('music', MusicController::class)
    ->middleware(MusicMiddleware::class)
    ->only('create', 'store', 'edit', 'update', 'destroy');
Route::resource('music', MusicController::class)->only('index', 'show');


Route::resource('artist', ArtistController::class)->only('edit', 'index', 'show');
Route::put('artist/{id}/update', [ArtistController::class, 'update'])->name('artist.update');
//Route::resource('users', 'App\Http\Controllers\UserController')->only('show', 'edit', 'update');
Route::resource('album', AlbumController::class)
    ->middleware(AlbumMiddleware::class)->only('create', 'store', 'edit', 'update', 'destroy');
Route::resource('album', AlbumController::class)->only('index', 'show');

Route::get('/user/profile/{id}', function ($id){
    $user = User::findOrFail($id);
    return view('user.profile', compact('user'));
})->name('user.profile');
Route::post('/user/profile/{id}',[UserProfileController::class, 'update'])->name('user.profile.update');

// Artist Routes

//Route::get('artist/login', [ArtistAuthController::class, 'index'])->name('artist.login');

Route::get('artist/register', [ArtistAuthController::class, 'registrationForm'])->name('artist.register');
Route::get('artist/login', [ArtistAuthController::class, 'loginForm'])->name('artist.login');
Route::post('artist/register', [ArtistAuthController::class, 'register'])->name('artist.register.submit');
Route::post('artist/login', [ArtistAuthController::class, 'login'])->name('artist.login.submit');

Route::get("/search", [SearchController::class, 'search_results'])->name("search.results");

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\User $user){
    $user->markEmailAsVerified();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
