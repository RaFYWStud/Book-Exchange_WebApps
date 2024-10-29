<x-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold mb-4">Buku yang Anda Tawarkan</h1>
        <a href="{{ route('offerbook') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Buku</a>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Cover</th>
                    <th class="py-2">Judul</th>
                    <th class="py-2">Deskripsi</th>
                    <th class="py-2">WhatsApp</th>
                    <th class="py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td class="py-2"><img src="{{ $book->cover_image }}" alt="Cover" class="w-16 h-16"></td>
                        <td class="py-2">{{ $book->title }}</td>
                        <td class="py-2">{{ $book->description }}</td>
                        <td class="py-2">{{ $book->whatsapp }}</td>
                        <td class="py-2">
                            <a href="{{ route('books.edit', $book) }}"
                                class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
