<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    // Display a listing of the tasks
    public function index()
    {
        $tugas = Tugas::orderBy('deadline', 'asc')->get();
        return view('tugas.index', compact('tugas'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return view('tugas.create');
    }

    // Store a newly created task in storage
    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|in:belum,selesai',
        ]);

        // Create a new task
        Tugas::create($validated);

        // Redirect to the task index
        return redirect()->route('tugas.index');
    }

    // Show the form for editing the specified task
    public function edit(Tugas $tugas)
    {
        return view('tugas.edit', compact('tugas'));
    }

    // Update the specified task in storage
    public function update(Request $request, Tugas $tugas)
    {
        // Validate input data
        $validated = $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|in:belum,selesai',
        ]);

        // Update the task
        $tugas->update($validated);

        // Redirect to the task index
        return redirect()->route('tugas.index');
    }

    // Remove the specified task from storage
    public function destroy(Tugas $tugas)
    {
        $tugas->delete();
        return redirect()->route('tugas.index');
    }
}
