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

        return view('posts', [
            'posts' => $posts->filter(request(['search']))->get(),
            'categories' => Category::all(),
        ]);
    }

    public function post(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }
}
