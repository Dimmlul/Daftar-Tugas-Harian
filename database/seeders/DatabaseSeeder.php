<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Membuat beberapa data tugas contoh untuk diisi ke dalam database

        Tugas::create([
            'judul_tugas' => 'Tugas Matematika',
            'deskripsi' => 'Membuat analisis statistika data',
            'deadline' => '2025-04-25',
            'status' => 'belum',
        ]);

        Tugas::create([
            'judul_tugas' => 'Tugas Bahasa Inggris',
            'deskripsi' => 'Membuat river of life dan mempresentasikannya.',
            'deadline' => '2025-04-17',
            'status' => 'selesai',
        ]);

        Tugas::create([
            'judul_tugas' => 'Tugas Sejarah',
            'deskripsi' => 'Membuat scrapbook dengan judul disintegrasi bangsa.',
            'deadline' => '2025-04-18',
            'status' => 'belum',
        ]);

        Tugas::create([
            'judul_tugas' => 'Tugas Produktif Phprad',
            'deskripsi' => 'Mempresentasikan aplikasi yang sudah dibuat.',
            'deadline' => '2025-04-22',
            'status' => 'belum',
        ]);

        Tugas::create([
            'judul_tugas' => 'Tugas Produktif Laravel',
            'deskripsi' => 'Membuat aplikasi daftar tugas dengan Laravel. Sebagai syarat STS.',
            'deadline' => '2025-04-22',
            'status' => 'selesai',
        ]);

        Tugas::create([
            'judul_tugas' => 'Tugas PPKN',
            'deskripsi' => 'Mengerjakan soal PPKN pilihan ganda dan essay.',
            'deadline' => '2025-04-22',
            'status' => 'selesai',
        ]);
    }
}
