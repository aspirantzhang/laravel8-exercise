<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // \Illuminate\Support\Facades\DB::listen(function ($query) {
        //     logger($query->sql, $query->bindings);
        // });

        $posts = Post::with('cate', 'author')->latest();

        return view('posts.index', [
            'posts' => $posts->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
        ]);
    }

    public function post(Post $post)
    {
        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
