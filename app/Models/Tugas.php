<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_tugas',
        'deskripsi',
        'deadline',
        'status',
    ];
    protected $casts = [
        'deadline' => 'date', // Tanggal deadline akan otomatis di-cast ke objek date. Kalo ga, nanti error jadi invalid date di fe (?)
    ];
}
