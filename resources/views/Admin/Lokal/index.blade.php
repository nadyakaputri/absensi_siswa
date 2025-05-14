@extends('templates.layout')

@section('title', 'Data Kelas')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Kelas</h4>
        <ul class="breadcrumbs">
            
            
            
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Kelas</h4>
                    <a href="{{route('lokal.create')}}" class="btn btn-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Tambah Kelas
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Wali Kelas</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lokal as $key)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$key['nama']}}</td>
                                    <td>{{$key['guru']['nama']}}</td>
                                    
                                    <td>
                                        <a href="{{route('lokal.edit', $key['id'])}}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
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