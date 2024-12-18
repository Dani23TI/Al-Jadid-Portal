<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class LaporanDaftarController extends Controller
{
    public function create()
    {
        $data['listPasien'] = \App\Models\Pasien::orderBy('nama','asc')->get();
        $data['listPoli'] = \App\Models\Poli::orderBy('namapoli','asc')->pluck('namapoli','id');
        return view('laporan_daftar_create', $data);
    }

    public function index(Request $request)
    {

        $models = Daftar::query();

        if ($request->filled('tanggal_mulai')) {
        $models->whereDate('tanggal_daftar', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
        $models->whereDate('tanggal_daftar', '<=', $request->tanggal_akhir);
        }

        if ($request->filled('poli_id')) {
        $models->where('poli_id', $request->poli_id);
        }
        $data['models'] = $models->latest()->get();

        return view('laporan_daftar_index', $data);
    }
}
