<x-header>
    <h1>{{ $post->title }}</h1>
    <div class="meta">
        By <a href="#">{{ $post->author->name }}</a> in
        <a href="/category/{{ $post->cate->slug }}">
            {{ $post->cate->name }}
        </a>
        {{ $post->created_at }}
    </div>
    <div class="excerpt">
        {{ $post->excerpt }}
    </div>
    <article>
        {!! $post->body !!}
    </article>
    <a href="{{ url('posts') }}">Back to List</a>
</x-header>
