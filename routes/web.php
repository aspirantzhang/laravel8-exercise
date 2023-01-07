<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/posts', function () {
    DB::listen(function ($query) {
        logger($query->sql, $query->bindings);
    });

    return view('posts', [
        'posts' => Post::with('cate', 'author')->get(),
        'categories' => Category::all(),
    ]);
})->name('posts');

Route::get('/posts/{post:slug}', function (Post $post) { // Elequent Post::where('slug', $post)->firstOrFail();
    return view('post', [
        'post' => $post,
    ]);
});

// Route::get('/posts/{post}', function ($id) {
//     return view('post', [
//         'post' => Post::findOrFail($id),
//     ]);
// });

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
});

Route::get('/author/{author}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load('cate'),
        'categories' => Category::all(),
    ]);
});
