<x-header>
    <h1>{{ $post->title }}</h1>
    <i>{{ $post->excerpt }}</i>
    <article>
        {!! $post->body !!}
    </article>
    <a href="{{ url('posts') }}">Back to List</a>
</x-header>
