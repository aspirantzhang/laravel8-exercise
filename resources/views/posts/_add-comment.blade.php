@auth
    <x-panel>
        <form method="post" action="/posts/{{ $post->slug }}/comment">
            @csrf
            <div class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" alt="" class="rounded-full">
                <span class="ml-3 font font-semibold">Want to participate?</span>
            </div>
            <textarea name="body" id="" rows="4" class="w-full mt-4 focus:outline-none focus:ring"
                placeholder="say something..."></textarea>
            <div class="flex justify-end mt-4 border-t border-gray-100 pt-3">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> for <a href="/login" class="hover:underline">Login</a> to
        leave a
        message.
    </p>
@endauth
