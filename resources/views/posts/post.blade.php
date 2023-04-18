<x-layout>
    <main class="max-w-6xl m-auto mt-8 pt-10">
        <article class="lg:grid grid-cols-12 gap-x-10">
            <div class="col-span-3">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
                <p class="text-gray-400 text-xs mt-5 text-center">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
                <div class="flex text-sm items-center mt-3 justify-center">
                    <img src="/images/lary-avatar.svg" alt="lara-avatar">
                    <div class="ml-3">
                        <h5 class="font-semibold">{{ $post->author->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-span-8 text-lg -mt-10">
                <header>
                    <div class="flex justify-between">
                        <a href="/posts" class="inline-flex items-center hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>
                        <div class="space-x-3">
                            <x-category-label :post="$post" />
                        </div>
                    </div>
                    <h1 class="text-3xl font-bold mt-3">{{ $post->title }}</h1>
                </header>
                <div class="space-y-4 mt-8">
                    {!! $post->body !!}
                </div>
            </div>

            <div class="col-span-8 col-start-4 mt-6 space-y-4">
                @include('posts._add-comment')

                @foreach ($post->comments as $comment)
                    <x-post-comment :comment="$comment" />
                @endforeach

            </div>

        </article>
    </main>

</x-layout>
