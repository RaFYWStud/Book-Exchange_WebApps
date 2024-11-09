<x-layout title="Buat Penawaran">
    <div class="flex justify-center items-center min-h-screen bg-green-100">
        <main>
            <div class="max-w-lg w-full bg-green-50 shadow-md rounded-lg p-8">
                <h1 class="text-3xl font-bold mb-6 text-center text-green-700">Tambah Buku</h1>
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-green-700 text-sm font-bold mb-2" for="cover_image">
                            Gambar Buku
                        </label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <label class="block text-green-700 text-sm font-bold mb-2" for="title">
                            Judul Buku
                        </label>
                        <input type="text" name="title" id="title"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan judul buku">
                    </div>
                    <div>
                        <label class="block text-green-700 text-sm font-bold mb-2" for="author">
                            Penulis Buku
                        </label>
                        <input type="text" name="author" id="author"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan nama penulis">
                    </div>
                    <div>
                        <label class="block text-green-700 text-sm font-bold mb-2" for="condition">
                            Kondisi Buku
                        </label>
                        <div class="relative">
                            <select name="condition" id="condition"
                                class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" disabled selected>Pilih kondisi buku</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Buruk">Buruk</option>
                                <option value="Sangat Buruk">Sangat Buruk</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path d="M7 10l5 5 5-5H7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="#" id="condition-info" class="text-green-600 hover:underline">Penjelasan
                                Kondisi</a>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-300">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Modal for condition explanation -->
    <div id="condition-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Penjelasan Kategori</h3>
                <div class="mt-2 px-7 py-3 text-left">
                    <p class="text-sm text-gray-500">
                        <strong>Sangat Baik:</strong> Buku baru dibeli dan tidak ada minus.<br>
                        <strong>Baik:</strong> Buku dalam kondisi baik namun ada beberapa minus pemakaian seperti cover
                        yang terlipat dan lain-lain.<br>
                        <strong>Buruk:</strong> Buku memiliki beberapa halaman yang kotor atau sobek kecil.<br>
                        <strong>Sangat Buruk:</strong> Beberapa halaman di buku hilang atau kotor keseluruhan halaman
                        nya.
                    </p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="close-modal"
                        class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('condition-info').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('condition-modal').classList.remove('hidden');
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('condition-modal').classList.add('hidden');
        });
    </script>
</x-layout>
