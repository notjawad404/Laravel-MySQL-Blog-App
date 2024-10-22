<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Authentication routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Posts routes

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {
    // Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/user/posts', [PostController::class, 'userPosts'])->name('posts.userposts');
    Route::resource('posts', PostController::class)->except(['index']);
});