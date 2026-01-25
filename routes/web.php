<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

Route::resource('posts', PostController::class);
Route::post('/test-simple', function(Request $request) {
    // Просто сохраняем без валидации
    $post = \App\Models\Post::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title) . '-' . rand(1000, 9999),
        'excerpt' => $request->excerpt,
        'body' => $request->body,
        'is_published' => $request->has('is_published'),
        'user_id' => auth()->id() ?? 1,
    ]);
    
    return redirect('/posts')->with('success', 'Работает!');
});