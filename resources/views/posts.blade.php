<x-header>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="<?php echo '/posts/' . $post->slug; ?>">
            {{ $post->title }}
            </a>
        </h1>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    @endforeach
</x-header>
