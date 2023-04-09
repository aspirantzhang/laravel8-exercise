<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => ['required'],
        ]);

        $post->comments()->create([
            'post_id' => $post->id,
            'user_id' => request()->user()->id,
            'body' => request('body'),
        ]);

        return back();
    }
}
