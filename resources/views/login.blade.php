<x-header>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-green-700 to-green-900 p-4">
        <main class="max-w-lg w-full bg-green-100 shadow-md rounded-lg p-8">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Login</h1>
            <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email"
                        class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Masukkan email" value="{{ old('email') }}">

                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="password"
                        class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Masukkan password">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 shadow-md text-white bg-green-500 hover:bg-green-600 rounded-lg focus:outline-none focus:shadow-outline">
                        Login
                    </button>
                </div>
            </form>
        </main>
    </div>
</x-header>
