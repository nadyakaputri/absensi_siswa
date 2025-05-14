@extends('templates.layout')

@section('title', 'Data Guru')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Guru</h4>
        <ul class="breadcrumbs">       
            
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Guru</h4>
                    <a href="{{route('guru.create')}}" class="btn btn-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Tambah Guru
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>nama</th>
                                    <th>aksi</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataguru as $key)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$key['NIP']}}</td>
                                    <td>{{$key['nama']}}</td>
                                    <td>
                                        
                                        <a href="{{route('guru.edit', $key['id'])}}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="{{route('guru.show', $key['id'])}}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        <form action="{{route('guru.delete', $key['id'])}}" method="POST" style="display:inline;">
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