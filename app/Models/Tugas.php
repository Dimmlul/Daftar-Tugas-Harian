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
    // Cast the 'deadline' field to a Carbon instance (datetime)
    protected $casts = [
        'deadline' => 'datetime',  // Automatically cast 'deadline' to a Carbon object  --> buat fe
    ];
}
