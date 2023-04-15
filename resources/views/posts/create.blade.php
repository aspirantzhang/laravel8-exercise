<x-layout>
    <main class="max-w-2xl m-auto mt-8 pt-10">
        <x-panel>
            <h1 class="text-center font-bold text-lg mb-10">Add New Post</h1>
            <form method="post" action="/admin/post">
                @csrf
                <div class="mb-6">
                    <label for="category" class="block mb-2 uppercase font-bold text-xs text-grey-700">Category</label>
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    <select name="category" id="category" class="w-full bg-white border border-gray-200 p-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-red-300 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-grey-700">Title</label>
                    <input type="text" class="border border-gray-200 p-2 w-full" name="title" id="title"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-red-300 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-grey-700">Slug</label>
                    <input type="text" class="border border-gray-200 p-2 w-full" name="slug" id="slug"
                        value="{{ old('slug') }}" required>
                    @error('slug')
                        <div class="text-red-300 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-grey-700">Excerpt</label>
                    <textarea class="border border-gray-200 p-2 w-full" name="excerpt" id="excerpt"required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <div class="text-red-300 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-grey-700">Body</label>
                    <textarea class="border border-gray-200 p-2 w-full" name="body" id="body"required>{{ old('body') }}</textarea>
                    @error('body')
                        <div class="text-red-300 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center mt-4 border-t border-gray-100 pt-3">
                    <x-submit-button>Submit</x-submit-button>
                </div>
            </form>
        </x-panel>
    </main>
</x-layout>
