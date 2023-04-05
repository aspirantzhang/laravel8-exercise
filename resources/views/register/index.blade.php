<x-layout>
    <main class="max-w-6xl m-auto mt-8 pt-10">
        <div class="max-w-lg mx-auto">
            <h1 class="text-center font-bold text-lg mb-10">Register</h1>
            <form method="post" action="/register">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-grey-700">Username</label>
                    <input type="text" class="border borer-gray-400 p-2 w-full" name="name" id="name" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-grey-700">Email</label>
                    <input type="email" class="border borer-gray-400 p-2 w-full" name="email" id="email"
                        required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-grey-700">password</label>
                    <input type="password" class="border borer-gray-400 p-2 w-full" name="password" id="password"
                        required>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="px-5 py-2 text-white font-bold bg-blue-500 rounded-full">Submit</button>
                </div>
            </form>

        </div>
    </main>
</x-layout>
