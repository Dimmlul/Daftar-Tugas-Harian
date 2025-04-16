@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-semibold mb-6">Daftar Tugas</h1>

        <!-- Form untuk filter tugas berdasarkan status -->
        <form action="{{ route('tugas.index') }}" method="GET" class="mb-4 flex items-center space-x-4">
            <div class="flex items-center">
                <label for="status_filter" class="text-sm font-medium text-gray-700 mr-2">Filter by Status</label>
                <select name="status_filter" id="status_filter"
                    class="mt-1 block px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                    <!-- Opsi filter berdasarkan status -->
                    <option value="all" {{ $statusFilter == 'all' ? 'selected' : '' }}>All</option>
                    <option value="belum" {{ $statusFilter == 'belum' ? 'selected' : '' }}>Belum</option>
                    <option value="selesai" {{ $statusFilter == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-600">Filter</button>
        </form>

        <!-- Progress Bar untuk menunjukkan progres tugas yang selesai -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Progress</label>
            <div class="w-full bg-gray-200 rounded-full">
                <div class="h-2 bg-green-500 rounded-full" style="width: {{ $progress }}%"></div>
            </div>
            <div class="text-sm mt-1 text-gray-600">{{ round($progress) }}% Completed</div>
        </div>

        <!-- Tombol untuk menambah tugas baru -->
        <a href="{{ route('tugas.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-6 inline-block">Tambah Tugas</a>

        <!-- Tabel Daftar Tugas -->
        <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Judul Tugas</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Deadline</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugas as $task)
                    <tr class="hover:bg-gray-100">
                        <!-- Menampilkan Judul Tugas -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">{{ $task->judul_tugas }}</td>

                        <!-- Menampilkan Deskripsi Tugas -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">
                            {{ $task->deskripsi ?? 'No description' }}</td>

                        <!-- Menampilkan Deadline Tugas -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">
                            @php
                                // Cek apakah deadline ada dan valid
                                $deadline = $task->deadline;
                                $formattedDate = 'Tanggal tidak valid'; // Default jika tanggal tidak valid

                                // error handling untuk format tanggal
                                if ($deadline) {
                                    try {
                                        // Coba formatkan tanggal jika valid
                                        $formattedDate = \DateTime::createFromFormat('Y-m-d H:i:s', $deadline)
                                            ? \DateTime::createFromFormat('Y-m-d H:i:s', $deadline)->format('d-m-Y')
                                            : 'Tanggal tidak valid';
                                    } catch (\Exception $e) {
                                        $formattedDate = 'Tanggal tidak valid';
                                    }
                                }
                            @endphp
                            {{ $formattedDate }} <!-- Menampilkan tanggal deadline -->
                        </td>

                        <!-- Menampilkan Status Tugas -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">
                            <span
                                class="px-2 py-1 text-xs rounded-full {{ $task->status == 'selesai' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>

                        <!-- Menampilkan Tombol Aksi -->
                        <td
                            class="px-6 py-4 text-sm font-medium text-gray-900 border-b flex items-center justify-between space-x-3">
                            @if ($task->status != 'selesai')
                                <!-- Tombol Selesaikan jika status belum selesai -->
                                <form action="{{ route('tugas.selesaikan', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Selesaikan</button>
                                </form>
                            @else
                                <span class="text-green-500">Selesai</span>
                            @endif

                            <!-- Tombol Edit dan Hapus -->
                            <div class="flex space-x-3">
                                <a href="{{ route('tugas.edit', $task->id) }}"
                                    class="text-blue-600 hover:text-blue-800">Edit</a> |
                                <form action="{{ route('tugas.destroy', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
