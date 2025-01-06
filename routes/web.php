<?php

use App\Models\Mahasiswa;
use illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LaporanDaftarController;
use App\Http\Controllers\LaporanPasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Auth\Middleware\Authenticate;

// Route::resource('mahasiswa', MahasiswaController::class);
// Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa_create');

Route::resource('pasien', PasienController::class)->middleware(Authenticate::class);
Route::middleware([Authenticate::class])->group(function() {
        Route::resource('pasien', PasienController::class);
        Route::resource('daftar', DaftarController::class);
        Route::resource('poli', PoliController::class);
        Route::resource('laporan-pasien', LaporanPasienController::class);
        Route::resource('laporan-daftar', LaporanDaftarController::class);
});
Route::resource('pengurus', PengurusController::class);
Route::get('/pengurus/create', [PengurusController::class, 'create'])->name('pengurus_create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
