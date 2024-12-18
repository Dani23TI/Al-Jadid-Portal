<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    /** @use HasFactory<\Database\Factories\PengurusFactory> */
    use HasFactory;

    protected $table = 'penguruses'; // Pastikan nama tabel sesuai
    protected $fillable = ['nim', 'nama', 'email', 'kelas']; // Kolom yang dapat diisi
}
