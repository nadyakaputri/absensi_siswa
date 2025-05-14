
@extends('templates.layout')

@section('title', 'Edit Jurusan')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Jurusan</h4>
        <ul class="breadcrumbs">
            
            
        </ul>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Jurusan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('jurusan.update', $jurusan->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Jurusan</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $jurusan->nama}}" required>
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
            </div>
        </div>
    </div>
</div>
@endsection
