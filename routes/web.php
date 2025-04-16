<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

// Show all tasks
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');

// Show form to create a new task
Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');

// Store a newly created task
Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');

// Show a specific task (optional)
Route::get('/tugas/{tugas}', [TugasController::class, 'show'])->name('tugas.show');

// Show form to edit an existing task
Route::get('/tugas/{tugas}/edit', [TugasController::class, 'edit'])->name('tugas.edit');

// Update an existing task
Route::put('/tugas/{tugas}', [TugasController::class, 'update'])->name('tugas.update');

// Delete a task
Route::delete('/tugas/{tugas}', [TugasController::class, 'destroy'])->name('tugas.destroy');
