<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    // Fungsi ini untuk menampilkan semua tugas dengan filter opsional berdasarkan status
    public function index(Request $request)
    {
        // Mengambil status filter dari request, jika tidak ada maka default 'all'
        $statusFilter = $request->get('status_filter', 'all');

        // Query tugas berdasarkan filter status
        if ($statusFilter == 'all') {
            // Jika status filter 'all', ambil semua tugas
            $tugas = Tugas::orderBy('deadline', 'asc')->get();
        } else {
            // Jika ada filter status, ambil tugas berdasarkan status yang dipilih
            $tugas = Tugas::where('status', $statusFilter)->orderBy('deadline', 'asc')->get();
        }

        // Hitung progress, berapa persen tugas yang sudah selesai
        $totalTasks = Tugas::count(); // Total tugas
        $completedTasks = Tugas::where('status', 'selesai')->count(); // Tugas yang sudah selesai
        $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0; // Menghitung persentase tugas selesai

        // Mengirim data tugas, progress, dan statusFilter ke view
        return view('tugas.index', compact('tugas', 'progress', 'statusFilter'));
    }

    // Menampilkan form untuk menambah tugas baru
    public function create()
    {
        // Mengembalikan tampilan form untuk tambah tugas baru
        return view('tugas.create');
    }

    // Menyimpan tugas baru ke database
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $validated = $request->validate([
            'judul_tugas' => 'required|string|max:32', // Judul tugas wajib diisi
            'deskripsi' => 'nullable|string|max:64', // Deskripsi opsional
            'deadline' => 'required|date', // Deadline tugas wajib diisi
            'status' => 'required|in:belum,selesai', // Status tugas wajib dipilih
        ]);

        // Menyimpan data tugas baru ke database
        Tugas::create($validated);

        // Redirect ke halaman daftar tugas setelah berhasil menyimpan
        return redirect()->route('tugas.index');
    }

    // Menampilkan form untuk mengedit tugas yang sudah ada
    public function edit(Tugas $tugas)
    {
        // Mengembalikan tampilan form edit tugas dengan data tugas yang akan diedit
        return view('tugas.edit', compact('tugas'));
    }

    // Mengupdate tugas yang sudah ada setelah diedit
    public function update(Request $request, Tugas $tugas)
    {
        // Validasi inputan yang baru
        $validated = $request->validate([
            'judul_tugas' => 'required|string|max:32',
            'deskripsi' => 'nullable|string|max:64', // Deskripsi opsional
            'deadline' => 'required|date',
            'status' => 'required|in:belum,selesai', // Validasi status
        ]);

        // Jika status diubah menjadi 'selesai', update statusnya
        if ($request->status == 'selesai') {
            $tugas->status = 'selesai';
        }

        // Update data tugas yang sudah ada
        $tugas->update($validated);

        // Redirect kembali ke halaman tugas setelah berhasil diupdate
        return redirect()->route('tugas.index');
    }

    // Fungsi untuk menghapus tugas dari database
    public function destroy(Tugas $tugas)
    {
        // Menghapus data tugas dari database
        $tugas->delete();

        // Redirect ke halaman daftar tugas setelah berhasil menghapus
        return redirect()->route('tugas.index');
    }

    // Fungsi untuk menandai tugas sebagai selesai
    public function selesaikan(Tugas $tugas)
    {
        // Update status tugas menjadi 'selesai'
        $tugas->status = 'selesai';
        $tugas->save(); // Simpan perubahan status ke database

        // Redirect ke halaman daftar tugas setelah selesai
        return redirect()->route('tugas.index');
    }
}
