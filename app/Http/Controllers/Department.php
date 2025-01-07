<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Department extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['department'] = \App\Models\Department::latest()->paginate(10);
        return view('department_id', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'department_create');
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
         $department = new \App\Models\Department(); //Membuat Objek Kosong di Variabel Model
         $department->fill($requestData); //Mengisi var model dengan data yang sudah ada
         $department->save(); //Menyimpan data Ke Database
         flash('Data Sudah Disimpan')->success();
         return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = \App\Models\Department::findOrFail($id);
        if ($department->daftar->count() >= 1){
            flash('Data tidak bisa dihapus karena sudah terkait dengan Pendaftaran')->error();
            return back();
        }
        $department->delete();
        flash('Data Sudah dihapus')->success();
        return back();
    }

}
