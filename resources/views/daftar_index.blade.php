@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Pasien</h5>
        <div class="card-body">
             {{-- Search --}}
            <form action="">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control"
                        placeholder="Nama atau Nomor Pasien" value="{{  request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">CARI</button>
                    </div>
                </div>
            </form>

            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/daftar/create" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Daftar</th>
                    <th>Poli</th>
                    <th>Keluhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien->nama  }}</td>
                        <td>{{ $item->pasien->jenis_kelamin  }}</td>
                        <td>{{ $item->tanggal_daftar }}</td>
                        <td>{{ $item->poli->namapoli }}</td>
                        <td>{{ $item->keluhan }}</td>

                        <td>
                            <a href="/daftar/{{ $item->id }}" class="btn btn-warning btn-sm ml-2">Detail</a>
                            <form action="/daftar/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm ml-2"
                                    onclilck="return confirm('Yakin ingin menghapus data?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                       {{-- <td>
                            @if ($item->foto)
                                <a href="{{ \Storage::url($item->foto) }}" target="blank">
                                    <img src="{{ \Storage::url($item->foto) }}" width="50">
                                </a>
                            @endif
                            {{ $item->nama }}
                        </td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->created_at }}</td> --}}
                    {{-- @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Pasien"
                                    style="width: 100px; height: auto;">
                            @else
                                <span>No Photo</span>
                            @endif --}}
                @endforeach
            </tbody>
        </table>
        {!! $daftar->links() !!}
    </div>
@endsection
