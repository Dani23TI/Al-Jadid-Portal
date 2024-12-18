@extends('layouts.app_modern', ['title' => 'Tambah Data Pasien'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Tambah Data Pengurus</h5>
            <form action="/pengurus" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Pengurus</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                        name="nim" value="{{ old('nim') }}">
                    <span class="text-danger">{{ $errors->first('nim') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kelas">Kelas</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelas" id="TRK" value="TRK"
                            {{ old('kelas') === 'TRK' ? 'checked' : '' }}>
                        <label class="form-check-label" for="TRK">TRK</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelas" id="TI" value="TI"
                            {{ old('kelas') === 'TI' ? 'checked' : '' }}>
                        <label class="form-check-label" for="TI">TI</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
