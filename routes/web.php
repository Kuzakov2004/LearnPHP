<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Route::get('/', fn () => redirect()->route('blog.index'))->name('index');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
});

Route::prefix('blog')->as('blog.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');

    Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('show');
});
