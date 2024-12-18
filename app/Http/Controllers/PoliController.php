<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use App\Http\Requests\StorePoliRequest;
use App\Http\Requests\UpdatePoliRequest;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poli'] = \App\Models\Poli::latest()->paginate(10);
        return view('poli_id', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_poli' => 'required|unique:polis,no_poli',
            'namapoli' => 'required|min:3',
            'biaya' => 'required|numeric',
            'keterangan' => 'nullable', //Alamat Boleh Kosong
         ]);
         $poli = new \App\Models\Poli(); //Membuat Objek Kosong di Variabel Model
         $poli->fill($requestData); //Mengisi var model dengan data yang sudah ada
         $poli->save(); //Menyimpan data Ke Database
         flash('Data Sudah Disimpan')->success();
         return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poli $poli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePoliRequest $request, Poli $poli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = \App\Models\Poli::findOrFail($id);
        if ($poli->daftar->count() >= 1){
            flash('Data tidak bisa dihapus karena sudah terkait dengan Pendaftaran')->error();
            return back();
        }
        $poli->delete();
        flash('Data Sudah dihapus')->success();
        return back();
    }
}
