<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/{post:slug}', [PostController::class, 'post']);

// Route::get('/posts/{post}', function ($id) {
//     return view('post', [
//         'post' => Post::findOrFail($id),
//     ]);
// });

Route::post('newsletter', function () {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us5',
    ]);

    // $response = $mailchimp->lists->getListMembersInfo('df1768c210');

    try {
        $mailchimp->lists->addListMember('df1768c210', [
            'email_address' => request('email'),
            'status' => 'pending',
        ]);
    } catch (\Exception $e) {
        throw Illuminate\Validation\ValidationException::withMessages(['email' => 'Your email address cannot added to our newsletter']);
    }

    return redirect('/posts')->with('success', 'Your email has added to our newsletter.');
});

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
