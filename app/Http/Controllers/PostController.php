<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

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

    public function store()
    {
        $attributes = request()->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
            'slug' => ['required', Rule::unique('post', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/posts')->with('success', 'Post Created.');
    }
}
