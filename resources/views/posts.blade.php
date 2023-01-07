<x-layout>
    @include('home-header')

    <main class="max-w-6xl m-auto mt-8">
        @if ($posts->count())
            <x-featured-post-card :post="$posts[0]" />

            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6 mt-8 space-y-8 lg:space-y-0">
                    @foreach ($posts->skip(1)->take(5) as $post)
                        <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}" />
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-center">No posts found.</p>
        @endif

    </main>
</x-layout>
