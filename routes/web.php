<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Route::get('/', fn () => redirect()->route('blog.index'))->name('index');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
});

Route::prefix('blog')->as('blog.')->middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');

    Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('show');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');