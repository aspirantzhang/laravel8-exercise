@props(['comment'])

<x-panel class="bg-gray-100 flex space-x-3">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{ $comment->id }}" alt="">
    </div>
    <div class="space-y-2">
        <header>
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">
                Posted
                <time>
                    {{ $comment->created_at }}
                </time>
            </p>
        </header>
        <p class="text-sm">
            {{ $comment->body }}
        </p>
    </div>
</x-panel>
