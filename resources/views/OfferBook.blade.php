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
                        <label class="block text-green-700 text-sm font-bold mb-2" for="description">
                            Deskripsi Buku
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan deskripsi buku"></textarea>
                    </div>
                    <div>
                        <label class="block text-green-700 text-sm font-bold mb-2" for="whatsapp">
                            Nomor WhatsApp
                        </label>
                        <input type="text" name="whatsapp" id="whatsapp"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-green-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan nomor WhatsApp">
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
</x-layout>
