@props(['post'])

<article
    {{ $attributes->merge(['class' => 'bg-gray-100 rounded-2xl p-2 lg:p-6 bg-opacity-0 hover:bg-opacity-100 transition-colors duration-300 border border-black border-opacity-0 hover:border-opacity-10']) }}>
    <div>
        <img src="{{ !empty($post->thumbnail) ? asset('storage/' . $post->thumbnail) : '/images/illustration-3.png' }}"
            alt="illustration-1" class="rounded-2xl">
    </div>
    <div class="flex flex-col justify-between mt-5">
        <header>
            <div class="space-x-3">
                <x-category-label :post="$post" />
            </div>

            <div>
                <h1 class="text-3xl mt-2">
                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                </h1>
                <span class="text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </span>
            </div>

        </header>
        <div class="space-y-3">
            {!! $post->excerpt !!}
        </div>
        <footer class="flex justify-between items-center mt-4">
            <div class="flex text-sm items-center flex-1">
                <img src="/images/lary-avatar.svg" alt="lara-avatar">
                <div class="ml-3">
                    <h5 class="font-semibold">
                        <a href="?author={{ $post->author->name }}">{{ $post->author->name }}
                        </a>
                    </h5>
                    <h6>Aspirant Zhang @ Laracasts</h6>
                </div>
            </div>
            <a href="/posts/{{ $post->slug }}"
                class="px-6 hidden md:block py-2 bg-gray-200 hover:bg-blue-500 hover:text-white transition-colors duration-300 rounded-xl rounded-full text-sm font-semibold">Read
                More</a>
        </footer>
    </div>
</article>
