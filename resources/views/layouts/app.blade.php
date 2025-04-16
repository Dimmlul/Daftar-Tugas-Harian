<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas Harian</title>

    <link rel="icon" type="image/png" href="{{ asset('FaviconDaftarTugas.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-50">
    <!-- Header bagian atas -->
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto">
            <!-- Judul utama aplikasi yang tampil di bagian header -->
            <h1 class="text-xl font-bold">Daftar Tugas Harian</h1>
        </div>
    </header>

    <!-- Main content area yang akan menampilkan konten dari halaman lain -->
    <main class="py-6">
        <!-- Menyertakan konten dari view lain menggunakan yield -->
        @yield('content')
    </main>


</body>

</html>
