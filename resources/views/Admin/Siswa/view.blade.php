@extends('templates.layout')
@section('title', 'Detail Siswa ' . $siswa->nama)

@section('content')
<div class="col">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Details Siswa</h5>

            <!--Vertical Form-->
            <form>
                @csrf
                <div class="mb-3">
                    <label for="NISN" class="form-label">NISN</label>
                    <input type="text" class="form-control" id="NISN" name="NISN" value="{{ $siswa->NISN }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siswa->alamat }}" disabled>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">nohp</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $siswa->nohp }}" disabled>
                    </div>
                    <div class="col-12">
                    <label for="JK" class="form-label">Jenis Kelamin</label>
                    <select name="JK" id="JK" class="form-control" disabled>
                        <option disabled selected value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ $siswa->JK == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $siswa->JK == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                    
                <div class="text-end">
                    <a href="{{ route('siswa') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection