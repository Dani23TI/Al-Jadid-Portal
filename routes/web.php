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

Route::get('/home', function () {
        // Pastikan hanya yang login yang bisa melihat halaman ini
        return view('home');
    })->name('home');
    
    // Akses CRUD hanya untuk yang sudah login
    Route::middleware(['auth'])->group(function () {
        Route::resource('pengurus', PengurusController::class);
        Route::get('/pengurus/create', [PengurusController::class, 'create'])->name('pengurus_create');
    });
    
    Auth::routes();