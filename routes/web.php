<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/auth', [RegisterController::class, 'index']);
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::get('/profile', [RegisterController::class, 'login'])->name('profile');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');
Route::get('/home', function () {
    return view('posts.index');
})->name('home');
