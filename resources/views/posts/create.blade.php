<x-layout>
    <main class="max-w-2xl m-auto mt-8 pt-10">
        <x-panel>
            <h1 class="text-center font-bold text-lg mb-10">Add New Post</h1>
            <form method="post" action="/admin/post" enctype="multipart/form-data">
                @csrf

                <x-form.field>
                    <x-form.label name="category" />
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    <select name="category" id="category" class="w-full bg-white border border-gray-200 p-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category" />
                </x-form.field>

                <x-form.input name="title" type="text" />
                <x-form.input name="slug" type="text" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.textarea name="excerpt" />
                <x-form.textarea name="body" />

                <div class="text-center mt-4 border-t border-gray-100 pt-3">
                    <x-form.button>Submit</x-form.button>
                </div>
            </form>
        </x-panel>
    </main>
</x-layout>
