@extends('templates.layout')

@section('title', 'Data Siswa')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Siswa</h4>
        <ul class="breadcrumbs">

        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Siswa</h4>
                    <a href="{{route('siswa.create')}}" class="btn btn-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Tambah Siswa
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $key)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $key->NISN }}</td>
                                    <td>{{ $key->nama }}</td>
                                    <td>{{ $key->lokal ? $key->lokal->nama : 'Data tidak ditemukan' }}</td> <!-- Display lokal name -->
                                    <td>
                                        <a href="{{ route('siswa.edit', $key->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{route('siswa.show', $key['id'])}}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        <form action="{{route('siswa.delete', $key['id'])}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection