<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    /** @use HasFactory<\Database\Factories\PengurusFactory> */
    use HasFactory;

    protected $table = 'penguruses'; // Pastikan nama tabel sesuai
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
