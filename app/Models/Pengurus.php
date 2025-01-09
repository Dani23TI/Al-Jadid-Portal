<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Pengurus extends Model
{
    use SearchableTrait;
    /** @use HasFactory<\Database\Factories\PengurusFactory> */
    use HasFactory;


    protected $table = 'penguruses'; // Pastikan nama tabel sesuai
    protected $searchable = [
        'columns' => [
            'penguruses.nama' => 10, // Kolom 'nama' di tabel penguruses
            'penguruses.nim' => 10,  // Kolom 'nim' di tabel penguruses
            'penguruses.email' => 10, // Kolom 'email' di tabel penguruses
        ],
    ];
    
    protected $fillable = ['nim', 'nama', 'department', 'email', 'kelas']; // Kolom yang dapat diisi
    use HasFactory;
    protected $guarded = [];

    // protected $searchable = [
    //     'columns' => [
    //         'departments.nama' => 10,
    //         'departments.no_department' => 10,
    //         'polis.namapoli' => 12,
    //     ],
    //     'joins' => [
    //         'department' => ['department.id','penguruses.no_department'],
    //         'polis' => ['polis.id','daftars.poli_id'],
    //     ],
    // ];

    // public function pengurus(): BelongsTo
    // {
    //     return $this->belongsTo(Department::class)->withDefault();
    // }
}
