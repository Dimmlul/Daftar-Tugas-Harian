@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-semibold mb-6">Tambah Tugas</h1>

        <!-- Form untuk menambah tugas baru -->
        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf <!-- Token CSRF untuk melindungi form dari serangan CSRF -->

            <!-- Input untuk Judul Tugas -->
            <div class="mb-4">
                <label for="judul_tugas" class="block text-sm font-medium text-gray-700">Judul Tugas</label>
                <input type="text" id="judul_tugas" name="judul_tugas"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                <!-- Menyediakan input teks untuk judul tugas, wajib diisi -->
            </div>

            <!-- Input untuk Deskripsi Tugas -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"></textarea>
                <!-- Textarea untuk deskripsi tugas, boleh kosong -->
            </div>

            <!-- Input untuk Deadline Tugas -->
            <div class="mb-4">
                <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" id="deadline" name="deadline"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                <!-- Input tipe tanggal untuk menentukan deadline tugas, wajib diisi -->
            </div>

            <!-- Input untuk Status Tugas -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                    <!-- Pilihan status tugas: 'Belum' atau 'Selesai' -->
                    <option value="belum">Belum</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <!-- Tombol untuk mengirim form dan menyimpan tugas -->
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-600">
                Simpan Tugas
            </button>
        </form>
    </div>
@endsection
