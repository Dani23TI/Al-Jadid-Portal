<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//ctrl p
class ProfilController extends Controller
{
    public function index(Request $request)
    {
        // return "Halo saya adalah fungsi index dalam ProfilController";
        echo 'Nama saya: ' . $request->nama;
        echo "<br>";
        echo 'Umur: ' . $request->umur;
    }
    public function create()
    {
        return "Halo saya adalah fungsi CREATE dalam ProfilController";
    }
    public function edit($nama, $id)
    {
        return "Halo, nama saya $nama $id";
    }
    
    public function dokterIndex()
    {
        return "Halo saya berada di halaman dokter index";

    }
    public function dokterCreate()
    {
        return "Halo saya berada di halaman tambah data dokter";
    }
    public function dokterEdit( $id)
    {
        return "Halo, nama saya berada dihalaman edit dengan nilai $id";
    }
    public function dokterEdit2( Request $request)
    {
        echo "Halo, nama saya berada dihalaman edit dengan nilai " . $request->id;
    }
}
