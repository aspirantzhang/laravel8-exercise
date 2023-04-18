<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('posts.list', [
            'posts' => Post::orderBy('created_at', 'DESC')->paginate(50),
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // ddd(request()->file('thumbnail'));

        $attributes = request()->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
            'slug' => ['required', Rule::unique('post', 'slug')],
            'thumbnail' => ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');

        Post::create($attributes);

        return redirect('/posts')->with('success', 'Post Created.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
            'slug' => ['required', Rule::unique('post', 'slug')->ignore($post->id)],
            'thumbnail' => ['image'],
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted');
    }
}
