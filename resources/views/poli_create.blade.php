@extends('layouts.app_modern', ['title' => 'Tambah Data Poli'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Tambah Data Poli</h5>
            <form action="/poli" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-1 mb-3">
                    <label for="no_poli">Nomor Poli</label>
                    <input type="text" class="form-control @error('no_poli') is-invalid @enderror" id="no_poli"
                        name="no_poli" value="{{ old('no_poli') }}">
                    <span class="text-danger">{{ $errors->first('no_poli') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="namapoli">Nama Poli</label>
                    <input type="text" class="form-control @error('namapoli') is-invalid @enderror" id="namapoli"
                        name="namapoli" value="{{ old('namapoli') }}">
                    <span class="text-danger">{{ $errors->first('namapoli') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="biaya">Biaya</label>
                    <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                        name="biaya" value="{{ old('biaya') }}">
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan" value="{{ old('keterangan') }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
