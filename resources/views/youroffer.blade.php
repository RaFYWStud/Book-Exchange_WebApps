<x-layout title="Buku yang Anda Tawarkan">
    <div class="container mx-auto mt-4 px-4">
        <h1 class="text-2xl font-bold mb-4 text-center text-green-700">Buku yang Anda Tawarkan</h1>
        <div class="flex justify-center mb-4">
            <a href="{{ route('offerbook') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah
                Buku</a>
        </div>
        <div class="space-y-4">
            @foreach ($books as $book)
                <div class="bg-green-100 shadow-lg rounded-lg overflow-hidden border border-green-200 flex">
                    <img src="{{ $book->cover_image }}" alt="Cover" class="w-32 h-32 object-cover rounded-l-lg">
                    <div class="p-4 flex-1">
                        <h2 class="text-xl font-bold text-green-900">{{ $book->title }}</h2>
                        <p class="mt-2 text-green-900">{{ $book->description }}</p>
                        <p class="mt-2 text-green-900">WhatsApp: {{ $book->whatsapp }}</p>
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('books.edit', $book) }}"
                                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
