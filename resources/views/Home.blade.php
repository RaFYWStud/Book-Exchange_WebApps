<!-- resources/views/home.blade.php -->

<x-layout title="Home">
    <div class="min-h-full bg-green-100">
        <header class="bg-green-500 shadow-md">
            <div class="px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-white">Read Cycle</h1>
            </div>
        </header>
        <main>
            <div class="px-4 py-6 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($books as $book)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
                            <img class="w-full h-48 object-cover" src="{{ $book->cover_image }}" alt="Cover Buku">
                            <div class="p-4">
                                <h2 class="text-xl font-bold text-green-700">{{ $book->title }}</h2>
                                <p class="mt-2 text-green-600">Penulis: {{ $book->author }}</p>
                                <p class="mt-2 text-green-600">Kondisi: {{ $book->condition }}</p>
                                <button onclick="openOfferModal({{ $book }})"
                                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tawar
                                    buku</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

    <!-- Modal for offering book -->
    <div id="offer-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Tawarkan Buku</h3>
                <form id="offer-book-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2 px-7 py-3 text-left">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="offer-cover_image">Gambar
                            Buku</label>
                        <input type="file" name="cover_image" id="offer-cover_image"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="offer-title">Judul Buku</label>
                        <input type="text" name="title" id="offer-title"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="offer-author">Penulis
                            Buku</label>
                        <input type="text" name="author" id="offer-author"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="offer-condition">Kondisi
                            Buku</label>
                        <select name="condition" id="offer-condition"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Buruk">Buruk</option>
                            <option value="Sangat Buruk">Sangat Buruk</option>
                        </select>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="offer-whatsapp">Nomor
                            WhatsApp</label>
                        <input type="text" name="whatsapp" id="offer-whatsapp"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="items-center px-4 py-3">
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Submit</button>
                        <button type="button" onclick="closeOfferModal()"
                            class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-gray-500 mt-2">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openOfferModal(book) {
            document.getElementById('offer-book-form').action = '/books/' + book.id + '/offer';
            document.getElementById('offer-modal').classList.remove('hidden');
        }

        function closeOfferModal() {
            document.getElementById('offer-modal').classList.add('hidden');
        }
    </script>
</x-layout>
