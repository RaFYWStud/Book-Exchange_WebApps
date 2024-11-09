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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</x-layout>
