@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-3xl font-semibold mb-6">Daftar Tugas</h1>

        <a href="{{ route('tugas.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-6 inline-block">Tambah Tugas</a>

        <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Judul Tugas</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Deadline</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugas as $task)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">{{ $task->judul_tugas }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">
                            {{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">
                            <span
                                class="px-2 py-1 text-xs rounded-full {{ $task->status == 'selesai' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b">
                            <a href="{{ route('tugas.edit', $task->id) }}"
                                class="text-blue-600 hover:text-blue-800">Edit</a> |
                            <form action="{{ route('tugas.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
