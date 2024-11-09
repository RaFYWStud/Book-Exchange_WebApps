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
                        <p class="mt-2 text-green-900">Penulis: {{ $book->author }}</p>
                        <p class="mt-2 text-green-900">Kondisi: {{ $book->condition }}</p>
                        <div class="mt-4 flex space-x-2">
                            <button onclick="openEditModal({{ $book }})"
                                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</button>
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

    <!-- Modal for editing book -->
    <div id="edit-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Buku</h3>
                <form id="edit-book-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-2 px-7 py-3 text-left">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-title">Judul Buku</label>
                        <input type="text" name="title" id="edit-title"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-author">Penulis Buku</label>
                        <input type="text" name="author" id="edit-author"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-condition">Kondisi
                            Buku</label>
                        <select name="condition" id="edit-condition"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Buruk">Buruk</option>
                            <option value="Sangat Buruk">Sangat Buruk</option>
                        </select>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Simpan</button>
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-2">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(book) {
            document.getElementById('edit-title').value = book.title;
            document.getElementById('edit-author').value = book.author;
            document.getElementById('edit-condition').value = book.condition;
            document.getElementById('edit-book-form').action = '/books/' + book.id;
            document.getElementById('edit-modal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('edit-modal').classList.add('hidden');
        }
    </script>
</x-layout>
