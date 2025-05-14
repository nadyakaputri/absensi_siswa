@extends('templates.layout')

@section('title', 'Edit Guru')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Guru</h4>
        <ul class="breadcrumbs">


        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Guru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('guru.update', $guru->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="NIP" name="NIP" value="{{ $guru->NIP }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $guru->alamat }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $guru->nohp }}" required>
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
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $guru->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $guru->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ $guru->password }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('guru') }}" class="btn btn-secondary">
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