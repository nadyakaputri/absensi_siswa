@extends('templates.layout')
@section('title', 'Detail Guru ' . $guru->nama)

@section('content')
<div class="col">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Details Guru</h5>

            <!--Vertical Form-->
            <form>
                @csrf
                <div class="col-12">
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="number" class="form-control" id="NIP" name="NIP" value="{{ $guru->NIP }}" disabled>
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" disabled>
                </div>
                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $guru->alamat }}" disabled>
                </div>
                <div class="col-12">
                    <label for="nohp" class="form-label">nohp</label>
                    <input type="number" class="form-control" id="nohp" name="nohp" value="{{ $guru->nohp }}" disabled>
                </div>
                <div class="col-12">
                    <label for="JK" class="form-label">Jenis Kelamin</label>
                    <select name="JK" id="JK" class="form-control" disabled>
                        <option disabled selected value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ $guru->JK == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $guru->JK == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
               
                <div class="text-end">
                    <a href="{{ route('guru') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection