<x-header>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
            {{ $post->title }}
            </a>

        </h1>
        <div class="meta">
            By <a href="/author/{{ $post->author->id }}">{{ $post->author->name }}</a> in
            <a href="/category/{{ $post->cate->slug }}">
                {{ $post->cate->name }}
            </a>
            {{ $post->created_at }}
        </div>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    @endforeach
</x-header>
