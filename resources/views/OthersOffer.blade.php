<!-- resources/views/othersoffer.blade.php -->

<x-layout title="Riwayat Penawaran">
    <div class="container mx-auto mt-4 px-4">
        <h1 class="text-2xl font-bold mb-4 text-center text-green-700">Riwayat Penawaran untuk Semua Buku Anda</h1>
        <div class="space-y-4">
            @foreach ($books as $book)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-green-700">{{ $book->title }}</h2>
                        <p class="mt-2 text-green-600">Penulis: {{ $book->author }}</p>
                        <p class="mt-2 text-green-600">Kondisi: {{ $book->condition }}</p>
                        <h3 class="text-lg font-bold mt-4 text-green-700">Tawaran:</h3>
                        @foreach ($book->offers as $offer)
                            <div class="bg-green-100 shadow-md rounded-lg overflow-hidden border border-green-200 mt-4">
                                <img src="{{ $offer->cover_image }}" alt="Cover"
                                    class="w-32 h-32 object-cover rounded-l-lg">
                                <div class="p-4 flex-1">
                                    <h4 class="text-lg font-bold text-green-900">{{ $offer->title }}</h4>
                                    <p class="mt-2 text-green-900">Penulis: {{ $offer->author }}</p>
                                    <p class="mt-2 text-green-900">Kondisi: {{ $offer->condition }}</p>
                                    <p class="mt-2 text-green-900">Ditawarkan oleh: {{ $offer->user->name }}</p>
                                    @if ($offer->status == 'accepted')
                                        <p class="mt-2 text-green-900">Silahkan lanjutkan transaksi dengan menghubungi
                                            nomor {{ $offer->whatsapp }} di WhatsApp!</p>
                                    @endif
                                    <div class="mt-4 flex space-x-2">
                                        @if ($offer->status == 'pending')
                                            <form action="{{ route('books.offers.accept', [$book, $offer]) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Terima</button>
                                            </form>
                                        @elseif ($offer->status == 'accepted')
                                            <form action="{{ route('books.offers.complete', [$book, $offer]) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Selesaikan
                                                    Transaksi</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
