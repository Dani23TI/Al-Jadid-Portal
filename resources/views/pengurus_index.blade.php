@extends('layouts.app_modern', ['title' => 'Data Pengurus'])
@section('content')
<div class="card" style="">
    <h3 class="card-header" style="background-color: green; color:azure">Data Pengurus</h3>
    <div class="card-body">
        <h4>Data Pengurus UKMI Ar-Ruhul Jadid</h4>
        <div class="row mb-3 mt-3">
            <div class="col-md-6">
                <a href="/pengurus/create" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="col-md-6">
                <form action="">
                    <div class="row g-3 mb-2">
                        <div class="col">
                            <input type="text" name="q" class="form-control" placeholder="Nama atau Email Pengguna"
                                value="{{ request('q') }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">CARI</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped w-100">

            <thead>
                <tr>
                    <th>Np</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Departemen</th>
                    <th>Kelas</th>
                    {{-- <th>Tgl Buat</th> --}}
                    <th>AKSI</th>
                </tr>

            </thead>
            <tbody>
                @if ($pengurus->count())
                @foreach ($pengurus as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->department }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>
                        <a href="/pengurus/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                        <form action="/pengurus/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2"
                                onclick="return confirm('Yakin ingin menghapus Data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    {!! $pengurus->appends(['search' => request('search')])->links() !!}

</div>
@endsection
