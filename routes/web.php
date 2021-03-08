<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// User Profil Management
Route::get('users/{user:username}', [UserProfileController::class, 'index'])->name('users.show');
Route::get('users/posts/{user:username}', [UserProfileController::class, 'posts'])->name('users.myposts');

// Show user posts
Route::get('users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

// Show dashboard for authorize user
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Login system
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Register system
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Post system management
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Logout system
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

// Like system of post
Route::post('posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');
