@extends('templates.layout')

@section('content')
<div class="container">
    <h1>Tambah Data Jurusan</h1>
    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jurusan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama jurusan" required>
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
    </form>
</div>
@endsection