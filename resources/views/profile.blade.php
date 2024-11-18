<!-- resources/views/profile.blade.php -->

<x-layout title="Profil Pengguna">
    <div class="container mx-auto mt-4 px-4">
        <h1 class="text-2xl font-bold mb-4 text-center text-green-700">Profil Pengguna</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-green-700 text-sm font-bold mb-2" for="name">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-green-700 text-sm font-bold mb-2" for="password">Kata Sandi Baru</label>
                <input type="password" name="password" id="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-green-700 text-sm font-bold mb-2" for="password_confirmation">Konfirmasi Kata
                    Sandi Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label class="block text-green-700 text-sm font-bold mb-2" for="profile_image">Foto Profil</label>
                <input type="file" name="profile_image" id="profile_image"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('profile_image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                @if ($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image"
                        class="mt-4 w-32 h-32 rounded-full">
                @endif
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layout>
