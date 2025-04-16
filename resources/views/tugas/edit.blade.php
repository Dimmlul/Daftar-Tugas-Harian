@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-semibold mb-6">Edit Tugas</h1>

        <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul_tugas" class="block text-sm font-medium text-gray-700">Judul Tugas</label>
                <input type="text" id="judul_tugas" name="judul_tugas"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                    value="{{ old('judul_tugas', $tugas->judul_tugas) }}" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" id="deadline" name="deadline"
                    value="{{ old('deadline', $tugas->deadline->format('Y-m-d')) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" required>
                    <option value="belum" {{ $tugas->status == 'belum' ? 'selected' : '' }}>Belum</option>
                    <option value="selesai" {{ $tugas->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Update
                Tugas</button>
        </form>
    </div>
@endsection
