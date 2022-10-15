<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(public string $title, public string $excerpt, public string $slug, public int $date, public string $body)
    {
    }

    public static function all()
    {
        return cache()->rememberForever(
            'post.all',
            fn () => collect(File::files(resource_path('posts')))
                ->map(fn ($file) => YamlFrontMatter::parse(File::get($file->getPathname())))
                ->map(fn ($post) => new Post(
                    $post->matter('title'),
                    $post->matter('excerpt'),
                    $post->matter('slug'),
                    $post->matter('date'),
                    $post->body(),
                ))
                ->sortByDesc('date')
        );
        // $files = File::files(resource_path('posts'));

        // $posts = [];

        // foreach ($files as $file) {
        //     $post = YamlFrontMatter::parse(File::get($file->getPathname()));
        //     $posts[] = new Post(
        //         $post->matter('title'),
        //         $post->matter('excerpt'),
        //         $post->matter('slug'),
        //         $post->matter('date'),
        //         $post->body(),
        //     );
        // }

        // return $posts;
    }

    public static function find(string $slug)
    {
        return static::all()->where('slug', $slug)->first();
        // $path = resource_path('posts') . '/' . $slug . '.html';

        // $post = YamlFrontMatter::parse(File::get($path));

        // return cache()->remember('post_' . $slug, 600, fn () => [
        //     'title' => $post->matter('title'),
        //     'excerpt' => $post->matter('excerpt'),
        //     'date' => $post->matter('date'),
        //     'slug' => $post->matter('slug'),
        //     'body' => $post->body(),
        // ]);
    }

    public static function findOrFail(string $slug)
    {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
