<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\ArtistAuthController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\ArtistMiddleware;
use App\Http\Middleware\MusicMiddleware;
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


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Auth::routes();

Route::get('/about', [AboutController::class, 'index'])->name('home.about');
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
//Route::get('/news', [NewsController::class, 'index'])->name('home.contact');
Route::resource('news', NewsController::class);

Route::resource('music', MusicController::class)
    ->middleware(MusicMiddleware::class)
    ->only('create', 'store', 'edit', 'update', 'destroy');
Route::resource('music', MusicController::class)->only('index', 'show');


Route::resource('artist', ArtistController::class)->only('edit', 'update', 'index', 'show');
//Route::resource('users', 'App\Http\Controllers\UserController')->only('show', 'edit', 'update');
Route::resource('album', AlbumController::class);


// Artist Routes

//Route::get('artist/login', [ArtistAuthController::class, 'index'])->name('artist.login');

Route::get('artist/register', [ArtistAuthController::class, 'registrationForm'])->name('artist.register');
Route::get('artist/login', [ArtistAuthController::class, 'loginForm'])->name('artist.login');
Route::post('artist/register', [ArtistAuthController::class, 'register'])->name('artist.register.submit');
Route::post('artist/login', [ArtistAuthController::class, 'login'])->name('artist.login.submit');

