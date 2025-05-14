@extends('templates.layout')

@section('title', 'Edit Siswa')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Siswa</h4>
        <ul class="breadcrumbs">


        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="NISN" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="NISN" name="NISN" value="{{ $siswa->NISN }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siswa->alamat }}" required>
                            <div class="mb-3">
                                <label for="nohp" class="form-label">nohp</label>
                                <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $siswa->nohp }}" required>
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
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $siswa->username }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="{{ $siswa->password }}" required>
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
            </div>
        </div>
    </div>
</div>
@endsection