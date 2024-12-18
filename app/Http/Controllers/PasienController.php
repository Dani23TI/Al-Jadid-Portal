<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = \App\Models\Pasien::latest()->paginate(10);
        if (request()->wantsJson()) {
            return response()->json($pasien);
        }
        $data['pasien'] = $pasien;
        return view('pasien_index', $data);
    }
    // SEBELUM API
    // {
    //     $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
    //     return view('pasien_index', $data);
    // }

    public function create()
    {
        return view('pasien_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable', //alamat boleh kosong
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            $pasien = new \App\Models\Pasien; //membuat objek kosong di variabel model
            $pasien->fill($requestData); //mengisi var model dengan data yang sudah divalidasi requestData
            $pasien->foto = $request->file('foto')->store('public'); //mengisi objek PathFoto
            $pasien->save(); //menyimpan data ke database
            if ($request->wantsJson()) {
                return response()->json($pasien);
            }
            flash('Data sudah disimpan')->success();
            return back();
            //mengarahkan user ke url sebelumnya yaitu /pasien/create dengan membawa variabel pesan

        //SEBELUM API
        // $requestData = $request->validate([
        //    'no_pasien' => 'required|unique:pasiens,no_pasien',
        //    'nama' => 'required|min:3',
        //    'umur' => 'required|numeric',
        //    'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        //    'alamat' => 'nullable', //Alamat Boleh Kosong
        //    'foto' => 'required|image|mimes:jpeg,jpg,png|max:5000',
        // ]);
        // $pasien = new \App\Models\Pasien(); //Membuat Objek Kosong di Variabel Model
        // $pasien->fill($requestData); //Mengisi var model dengan data yang sudah ada
        // $pasien->foto = $request->file('foto')->store('public'); //Mengisi Objek Pathpoto
        // $pasien->save(); //Menyimpan data Ke Database
        // flash('Data Sudah Disimpan')->success();
        // return back();
        //Mengarahkan user ke url sebelumnya yaitu \pasien\create dengan membawa Var
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['pengurus'] = \App\Models\Pengurus::findOrFail($id);
        return view('pengurus_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable', //Alamat Boleh Kosong
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:5000',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id); //Membuat Objek Kosong di Variabel Model
        $pasien->fill($requestData); //Mengisi var model dengan data yang sudah ada
        //karena di validasi foto boleh null, maka perlu pengecekan apakah ada file foto
        //jika ada maka file foto lama di hapus dan diganti dengan file foto yang baru
        if ($request->hasFile('foto')) {
            Storage::delete($pasien->foto);
            $pasien->foto = $request->file('foto')->store('public');
        }
        $pasien->save(); //Menyimpan data Ke Database
        flash('Data Sudah Disimpan')->success();
        return redirect('/pasien');
        //Mengarahkan user ke url sebelumnya yaitu \pasien\create dengan membawa Var
    }

    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        if ($pasien->daftar->count() >= 1){
            flash('Data tidak bisa dihapus karena sudah terkait dengan poli')->error();
            return back();
        }
        if ($pasien->foto != null && Storage::exists($pasien->foto)){
            Storage::delete($pasien->foto);
        }
        $pasien->delete();
        flash('Data Sudah dihapus')->success();
        return back();
    }
}
