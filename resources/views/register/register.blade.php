
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10" >
            <h1 class="text-center mb-5 text-xl">Register</h1>
            <form action="/register" method="post">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        username
                    </label>

                    <input class = "border border-gray-400 p-2 w-full"
                           type="text"
                           name="username"
                           id="username"
                           value="{{old('username')}}"
                           required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <label class="block mb-2 uppercase font-bold text-xs mt-3 text-gray-700" for="name">
                        Name
                    </label>
                    <input class = "border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{old('name')}}"
                           required>
                    @error('name')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <label class="block mb-2 uppercase font-bold text-xs mt-3 text-gray-700" for="email">
                        Email
                    </label>

                    <input class = "border border-gray-400 p-2 w-full"
                           type="text"
                           name="email"
                           id="email"
                           value="{{old('email')}}"
                           required>

                    @error('email')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <label class="block mb-2 uppercase font-bold text-xs mt-3 text-gray-700" for="password">
                        Password
                    </label>

                    <input class = "border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required>
                    @error('password')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <button class="bg-blue-400 text-white rounded py-2 px-4 mt-5 hover:bg-blue-500" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
