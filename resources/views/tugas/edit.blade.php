@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-semibold mb-6">Edit Tugas</h1>

        <!-- Form untuk mengedit tugas -->
        <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
            @csrf <!-- Token CSRF untuk menghindari serangan CSRF -->
            @method('PUT') <!-- Menandakan bahwa ini adalah permintaan untuk update (PUT) -->

            <!-- Input untuk Judul Tugas -->
            <div class="mb-4">
                <label for="judul_tugas" class="block text-sm font-medium text-gray-700">Judul Tugas</label>
                <input type="text" id="judul_tugas" name="judul_tugas"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                    value="{{ $tugas->judul_tugas }}" required>
                <!-- Tampilkan nilai judul tugas yang sedang diedit -->
            </div>

            <!-- Input untuk Deskripsi Tugas -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">{{ $tugas->deskripsi }}</textarea>
                <!-- Tampilkan deskripsi tugas yang bisa diedit -->
            </div>

            <!-- Input untuk Deadline Tugas -->
            <div class="mb-4">
                <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" id="deadline" name="deadline" value="{{ $tugas->deadline->format('Y-m-d') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                <!-- Tampilkan tanggal deadline yang sudah ada dengan format yang benar -->
            </div>

            <!-- Input untuk Status Tugas -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                    <!-- Pilihan status tugas: 'belum' atau 'selesai' -->
                    <option value="belum" {{ $tugas->status == 'belum' ? 'selected' : '' }}>Belum</option>
                    <option value="selesai" {{ $tugas->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <!-- Tombol untuk submit form dan melakukan update tugas -->
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-600">Update
                Tugas</button>
        </form>
    </div>
@endsection
