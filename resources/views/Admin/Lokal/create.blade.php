@extends('templates.layout')

@section('content')
<div class="container">
    <h1>Tambah Data Kelas</h1>
    <form action="{{ route('lokal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama kelas" required>
        </div>
        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select class="form-control" id="jurusan_id" name="jurusan_id" required>
            <option value="" disabled selected>Pilih Jurusan</option>
            @foreach($jurusan as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="guru_id" class="form-label">Wali Kelas</label>
            <select class="form-control" id="guru_id" name="guru_id" required>
                <option value="" disabled selected>Pilih Guru</option>
                @foreach($guru as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('lokal.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
    </form>
</div>
@endsection