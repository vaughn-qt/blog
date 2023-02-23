
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10" >
            <form action="/login" method="post">
                @csrf
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                    username
                </label>

                <input class = "border border-gray-400 rounded-full p-2 w-full"
                       type="text"
                       name="username"
                       id="username"
                       value="{{old('username')}}"
                       required>
                @error('username ')
                <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
                <label class="block mb-2 uppercase font-bold text-xs mt-3 text-gray-700" for="password">
                    Password
                </label>

                <input class = "border border-gray-400 rounded-full p-2 w-full"
                       type="password"
                       name="password"
                       id="password"
                       required>
                @error('password')
                <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
                <button class="bg-blue-400 text-white rounded py-2 px-4 mt-5 hover:bg-blue-500" type="submit">
                    Login
                </button>
            </form>
        </main>
    </section>
</x-layout>
