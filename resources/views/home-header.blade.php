<header class="mt-10 text-center">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">Lavavel From Scratch</span> News
        </h1>
        <div class="mt-4 lg:space-x-3 space-y-3">
            <div class="lg:inline-flex relative">
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
                        <x-dropdown-item href="?category={{ $category->slug }}" :active="request()->is('category/' . $category->slug)">
                            {{ $category->name }}
                        </x-dropdown-item>
                    @endforeach
                </x-dropdown>
            </div>
            <span class="bg-gray-100 flex lg:inline-flex items-center rounded-full relative">
                <form action="#" class="w-full">
                    <input type="text" name="search" placeholder="Find Something..."
                        class="text-sm bg-transparent pl-3 pr-9 py-3 placeholder-black font-semibold w-full focus-within:outline-none">
                </form>
            </span>
        </div>
    </div>
</header>
