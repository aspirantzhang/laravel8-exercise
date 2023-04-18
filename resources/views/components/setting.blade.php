@props(['heading'])

<section class="max-w-5xl m-auto">

    <h1 class="font-bold text-lg mb-2 pb-3 border-b border-gray-200">{{ $heading }}</h1>

    <div class="flex">
        <aside class="w-52">
            <h2 class="font-semibold mb-4">Link</h2>
            <ul>
                <li>
                    <a href="/admin/post">
                        Dashboard</a>
                </li>
                <li><a href="/admin/post/create"
                        class="{{ request()->is('admin/post/create') ? 'text-blue-500' : '' }}">Add new post</a></li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
