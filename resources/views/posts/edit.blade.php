<x-layout>
    <x-setting :heading="'Edit:' . $post->title">
        <form method="post" action="/admin/post/{{ $post->id }}" enctype="multipart/form-data">
            @method('patch')
            @csrf

            <x-form.field>
                <x-form.label name="category" />
                @php
                    $categories = \App\Models\Category::all();
                @endphp
                <select name="category" id="category" class="w-full bg-white border border-gray-200 p-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category', $post->cate->id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </x-form.field>

            <x-form.input name="title" type="text" :value="old('title', $post->title)" />
            <x-form.input name="slug" type="text" :value="old('slug', $post->slug)" />
            <div class="flex">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>
                <img class="" src="{{ asset('storage/' . $post->thumbnail) }}" alt="" width="100">
            </div>
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <div class="text-center mt-4 border-t border-gray-100 pt-3">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
