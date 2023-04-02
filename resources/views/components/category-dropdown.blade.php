<x-dropdown>
    <x-slot name="trigger">
        <button
            class="lg:w-32 w-full bg-gray-100 rounded-full py-3 text-sm font-semibold text-left pl-3 inline-flex">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-icon name="dropdownIcon"
                class="transform -rotate-90 absolute right-2 pointer-events-none" />
        </button>
    </x-slot>
    <x-dropdown-item href="/posts" :active="request()->routeIs('posts')">All</x-dropdown-item>
    @foreach ($categories as $category)
        {{-- class="{{ request()->is('/category' . $category->slug) ? 'bg-blue-500 text-white' : '' }}"> --}}
        <x-dropdown-item href="?category={{ $category->slug }}&{{http_build_query(request()->except('category'))}}" :active="request()->is('category/' . $category->slug)">
            {{ $category->name }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
