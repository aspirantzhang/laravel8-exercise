@props(['post'])

<a href="/posts?category={{ $post->cate->slug }}"
    class="px-4 py-1 rounded-xl border rounded-full border-blue-300 uppercase text-blue-300 text-xs font-semibold">{{ $post->cate->name }}</a>
