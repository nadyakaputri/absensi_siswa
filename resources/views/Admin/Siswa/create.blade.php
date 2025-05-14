@extends('templates.layout')

@section('content')
<div class="container">
    <h1>Tambah Data Siswa</h1>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NISN" class="form-label">NISN</label>
            <input type="number" class="form-control" id="NISN" name="NISN" placeholder="Masukkan NISN " required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Siswa" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan  alamat" required>
            <div class="mb-3">
                <label for="nohp" class="form-label">nohp</label>
                <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Masukkan nohp" required>
            </div>
            <div class="mb-3">
                <label for="JK">Jenis Kelamin</label>
                <select name="JK" id="JK" class="form-control" required>
                    <option disabled selected value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lokal_id" class="form-label">Kelas</label>
                <select name="lokal_id" id="lokal_id" class="form-control" required>
                    <option disabled selected value="">Pilih Kelas</option>
                    @foreach ($lokal as $lkl)
                    <option value="{{ $lkl->id }}">{{ $lkl->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('siswa') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
    </form>
</div>
@endsection