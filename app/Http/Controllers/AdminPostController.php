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
        Post::create([
            ...$this->validatePost() ?? [],
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnail'),
        ]);

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
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
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

    protected function validatePost($post = null)
    {
        $post ??= new Post();

        return request()->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
            'slug' => ['required', Rule::unique('post', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }
}
