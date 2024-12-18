@extends('layouts.app_modern', ['title' => 'Data Pengurus'])
@section('content')
    <div class="card">
        <h3 class="card-header">Data Pengurus</h3>
        <div class="card-body">
            <h4>Data Pengurus UKMI Ar-Ruhul Jadid</h4>
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/pasien/create" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Np</th>
                    <th>No Pasien</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    {{-- <th>Tgl Buat</th> --}}
                    <th>AKSI</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($pengurus as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->kelas }}</td>
                        {{-- <td>{{ $item->created_at }}</td> --}}
                        <td>
                            <a href="/pengurus/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                            <form action="/pengurus/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm ml-2"
                                    onclick="return confirm('Yakin ingin menghapus Data?')">Hapus</button>
                            </form>
                        </td>
                        <td></td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {!! $pengurus->links() !!}
    </div>
@endsection
