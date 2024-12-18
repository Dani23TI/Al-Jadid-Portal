<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        if (request()->filled('q')) {
            $data['daftar'] = Daftar::search(request('q'))->paginate(10);
        } else {
            $data['daftar'] = Daftar::latest()->paginate(10);
        }
        // $data['daftar'] =  \App\Models\Daftar::latest()->paginate(20);
        return view('daftar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] =  \App\Models\Pasien::orderBy('nama', 'asc')->get();
        $data['listPoli'] =  \App\Models\Poli::orderBy('namapoli', 'asc')->get();
        return view('daftar_create', data: $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required',
            'pasien_id' => 'required',
            'poli_id' => 'required',
            'keluhan' => 'required',
        ]);

        $daftar = new Daftar();
        $daftar->fill($requestData);
        $daftar->save();

        flash(message: 'Data sudah disimpan')->success();
        return redirect()->route('daftar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDaftarRequest $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $daftar = \App\Models\Daftar::FindOrFail($id);
        if ($daftar->poli->count() >= 1) {
            flash(message: 'Data tidak bisa dihapus karena sudah terkait dengan data poli')->error();
            return back();
        }

        $daftar->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }
}
