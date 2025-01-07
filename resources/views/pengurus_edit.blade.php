@extends('layouts.app_modern', ['title' => 'Edit Data Pengurus'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Pengurus : <b>{{ strtoupper($pengurus->nama) }}</b></h5>
        <div class="card-body">
            <form action="/pengurus/{{ $pengurus->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') ?? $pengurus->nama }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                        name="nim" value="{{ old('nim') ?? $pengurus->nim }}">
                    <span class="text-danger">{{ $errors->first('nim') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="department">Department</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="department" id="laki_laki" value="Danus"
                            {{ old('department') ?? $pengurus->department === 'Danus' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Danus">Danus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="department" id="Kaderisasi" value="Kaderisasi"
                            {{ old('department') ?? $pengurus->department === 'Kaderisasi' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Kaderisasi">Kaderisasi</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="department" id="Media" value="Media"
                            {{ old('department') ?? $pengurus->department === 'Media' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Media">Media</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
