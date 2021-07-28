<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboadController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', [DashboadController::class,'index'])
        ->name('dashboard')
        ->middleware('auth');

Route::get('/register', [RegisterController::class,'index'])
        ->name('register')
        ->middleware('guest');

Route::post('/register', [RegisterController::class,'store'])
        ->middleware('guest');

Route::get('/login', [LoginController::class,'index'])
        ->name('login')
        ->middleware('guest');

Route::post('/login', [LoginController::class,'store'])
        ->middleware('guest');

Route::post('/logout', [LogoutController::class,'store'])
        ->name('logout')
        ->middleware('auth');

Route::get('/post', [PostController::class,'index'])
        ->name('post');

Route::post('/post', [PostController::class,'create'])
        ->middleware('auth');


