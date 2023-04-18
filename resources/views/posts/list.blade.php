<x-layout>
    <x-setting heading="Posts List">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Post Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Create Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $post->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->cate->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 text-right flex">
                                <a href="/admin/post/{{ $post->id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form method="post" action="/admin/post/{{ $post->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-setting>
</x-layout>
