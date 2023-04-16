<x-layout>
    <main class="max-w-2xl m-auto mt-8 pt-10">
        {{-- <div class="max-w-lg mx-auto bg-gray-100 px-4 py-3 rounded-xl"> --}}
        <x-panel>
            <h1 class="text-center font-bold text-lg mb-10">Login</h1>
            <form method="post" action="/login">
                @csrf
                <x-form.input name="email" autocomplete="email" />
                <x-form.input name="password" type="password" autocomplete="new-password" />
                <div class="text-center">
                    <x-form.button>Login</x-form.button>
                </div>
                @foreach ($errors->all() as $error)
                    <li class="text-red-300 text-xs">{{ $error }}</li>
                @endforeach
            </form>
        </x-panel>

        {{-- </div> --}}
    </main>
</x-layout>
