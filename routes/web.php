<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

// Menampilkan semua tugas
Route::get('/', [TugasController::class, 'index'])->name('tugas.index');
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');

// Menampilkan form untuk menambah tugas baru
Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');

// Menyimpan tugas yang baru dibuat
Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');

// Menampilkan detail tugas tertentu (optional)
// Route::get('/tugas/{tugas}', [TugasController::class, 'show'])->name('tugas.show');

// Menampilkan form untuk mengedit tugas yang sudah ada
Route::get('/tugas/{tugas}/edit', [TugasController::class, 'edit'])->name('tugas.edit');

// Mengupdate tugas yang sudah ada
Route::put('/tugas/{tugas}', [TugasController::class, 'update'])->name('tugas.update');

// Menghapus tugas
Route::delete('/tugas/{tugas}', [TugasController::class, 'destroy'])->name('tugas.destroy');

// Menandai tugas sebagai selesai
Route::put('/tugas/{tugas}/selesaikan', [TugasController::class, 'selesaikan'])->name('tugas.selesaikan');
