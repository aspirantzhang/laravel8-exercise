@props(['comment'])

<div class=" space-x-3 bg-gray-100 rounded-xl border border-gray-200 p-4 flex">
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
</div>
