<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    public function create()
    {
        return view('laporan_pasien_create');
    }

    public function index(Request $request)
    {
        // Query awal untuk model pasien
        $pasien = \App\Models\Pasien::query();

        // Filter berdasarkan tanggal mulai
        if ($request->filled('tanggal_mulai')) {
        $pasien->whereDate('created_at', '>=', $request->tanggal_mulai);
        }

        // Filter berdasarkan tanggal selesai
        if ($request->filled('tanggal_selesai')) {
        $pasien->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        // Filter berdasarkan jenis kelamin
        if ($request->filled('jenis_kelamin') && $request->jenis_kelamin != 'semua') {
        $pasien->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // **Filter berdasarkan umur minimal**
        if ($request->filled('umur_min')) {
        $pasien->where('umur', '>=', $request->umur_min);
        }

        // **Filter berdasarkan umur maksimal**
        if ($request->filled('umur_max')) {
        $pasien->where('umur', '<=', $request->umur_max);
        }
        // Ambil data yang sudah difilter
        $data['models'] = $pasien->latest()->get();
        // Tampilkan ke view
        return view('laporan_pasien_index', $data);
    }
}
