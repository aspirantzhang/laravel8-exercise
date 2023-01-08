@props(['trigger'])

<div x-data="{ open: false }" @click.away="open = false">
    {{-- trigger --}}
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    {{-- items --}}
    <div class="absolute w-full bg-gray-100 rounded-xl mt-2 z-50 max-h-40 overflow-auto" x-show="open"
        x-transition.duration.400ms style="display: none">
        {{ $slot }}
    </div>
</div>
