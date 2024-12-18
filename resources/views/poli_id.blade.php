@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <h3 class="card-header">Data Poli</h3>
        <div class="card-body">
            <h4>Data pasien Klinik Merah</h4>
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/poli/create" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nomor Poli</th>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Keterangan</th>
                    <th>AKSI</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($poli as $item)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_poli }}</td>
                        <td>{{ $item->namapoli }}</td>
                        <td>{{ $item->biaya }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                            <form action="/poli/{{ $item->id }}" method="POST" class="d-inline">
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
        {!! $poli->links() !!}
    </div>
@endsection
