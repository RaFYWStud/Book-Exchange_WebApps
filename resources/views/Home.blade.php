<x-layout>
    <div class="min-h-full">
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($books as $book)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                            <img class="w-full h-48 object-cover" src="{{ $book->cover_image }}" alt="Cover Buku">
                            <div class="p-4">
                                <h2 class="text-xl font-bold text-gray-900">{{ $book->title }}</h2>
                                <p class="mt-2 text-gray-600">{{ $book->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</x-layout>
