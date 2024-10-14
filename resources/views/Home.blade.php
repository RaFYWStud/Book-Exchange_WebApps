<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Home</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Read Cycle</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- List Buku -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Buku 1 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Cover Buku">
                        <div class="p-4">
                            <h2 class="text-xl font-bold text-gray-900">Judul Buku 1</h2>
                            <p class="mt-2 text-gray-600">Deskripsi singkat buku 1. Ini adalah contoh deskripsi
                                singkat untuk buku 1.</p>
                        </div>
                    </div>
                    <!-- Buku 2 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Cover Buku">
                        <div class="p-4">
                            <h2 class="text-xl font-bold text-gray-900">Judul Buku 2</h2>
                            <p class="mt-2 text-gray-600">Deskripsi singkat buku 2. Ini adalah contoh deskripsi
                                singkat untuk buku 2.</p>
                        </div>
                    </div>
                    <!-- Buku 3 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Cover Buku">
                        <div class="p-4">
                            <h2 class="text-xl font-bold text-gray-900">Judul Buku 3</h2>
                            <p class="mt-2 text-gray-600">Deskripsi singkat buku 3. Ini adalah contoh deskripsi
                                singkat untuk buku 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
