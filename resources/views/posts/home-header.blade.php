<header class="mt-10 text-center">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">Lavavel From Scratch</span> News
        </h1>
        <div class="mt-4 lg:space-x-3 space-y-3">
            <div class="lg:inline-flex relative">
                <x-category-dropdown />
            </div>
            <span class="bg-gray-100 flex lg:inline-flex items-center rounded-full relative">
                <form action="#" class="w-full">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{request('category')}}">
                    @endif
                    <input type="text" name="search" placeholder="Find Something..." value="{{request('search')}}"
                        class="text-sm bg-transparent pl-3 pr-9 py-3 placeholder-black font-semibold w-full focus-within:outline-none">
                </form>
            </span>
        </div>
    </div>
</header>
