<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Requests\StorePengurusRequest;
// use App\Http\Requests\UpdatePengurusRequest;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $pengurus = Pengurus::paginate(10); // Sesuaikan model dengan struktur database Anda
    // return view('pasien.index', compact('pengurus'));

    // Ambil data pengurus dari tabel penguruses
    $pengurus = Pengurus::paginate(10); // Atur pagination sesuai kebutuhan
    // Kirim data ke view
    return view('pengurus_index', compact('pengurus'));

        // $data['pengurus'] = \App\Models\Pengurus::latest()->paginate(10);
        // return view('nim', $data);

        //Before
        // $pengurus = \App\Models\Pengurus::latest()->paginate(10);
        // if (request()->wantsJson()) {
        //     return response()->json(data: $pengurus);
        // }
        // $data['pengurus'] = $pengurus;
        // return view(view: 'pengurus_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nim' => 'required|unique:nim',
            'nama' => 'required|min:3',
            'email' => 'required',
            'kelas' => 'required', //Alamat Boleh Kosong
         ]);
         $pengurus = new \App\Models\Pengurus(); //Membuat Objek Kosong di Variabel Model
         $pengurus->fill($requestData); //Mengisi var model dengan data yang sudah ada
         $pengurus->save(); //Menyimpan data Ke Database
         flash('Data Sudah Disimpan')->success();
         return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pengurus'] = \App\Models\Pengurus::findOrFail($id);
        return view('pengurus_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nim' => 'required|unique:nim' . $id,
            'nama' => 'required|min:3',
            'email' => 'required',
            'kelas' => 'required',
        ]);
        $pengurus = \App\Models\Pengurus::findOrFail($id); //Membuat Objek Kosong di Variabel Model
        $pengurus->fill($requestData);

        $pengurus->save(); //Menyimpan data Ke Database
        flash('Data Sudah Disimpan')->success();
        return redirect('/pengurus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengurus = \App\Models\Pengurus::findOrFail($id);
        if ($pengurus->daftar->count() >= 1){
            flash('Data tidak bisa dihapus karena sudah terkait dengan poli')->error();
            return back();
        }
        $pengurus->delete();
        flash('Data Sudah dihapus')->success();
        return back();
    }
}
