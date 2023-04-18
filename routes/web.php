<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/{post:slug}', [PostController::class, 'post']);

// Route::get('/posts/{post}', function ($id) {
//     return view('post', [
//         'post' => Post::findOrFail($id),
//     ]);
// });

Route::post('newsletter', NewsletterController::class);

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts.index', [
        'posts' => App\Models\Post::with('cate', 'author')->whereHas('cate', function ($query) use ($category) {
            return $query->where('categories.slug', $category->slug);
        })->latest()->filter(request(['author']))->get(),
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
});

Route::get('/author/{author}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts->load('cate'),
        'categories' => Category::all(),
    ]);
});

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('/login', [SessionController::class, 'login'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/posts/{post:slug}/comment', [PostCommentController::class, 'store']);

Route::get('admin/post/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/post', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/post', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/post/{post:id}', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/post/{post:id}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/post/{post:id}', [AdminPostController::class, 'destroy'])->middleware('admin');
