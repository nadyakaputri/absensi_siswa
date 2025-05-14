@extends('templates-guru.layout')
@section('title', 'Data Absen')

@section('content')
<a href="{{ route('absen.create') }}" class="btn btn-success btn-custom-width mb-2">
    <i class="fas fa-plus"></i> Absen Siswa
</a>

<div class="card">
    <h5 class="card-header">Management Data Absen</h5>
    <div class="card-body">
        <form method="GET" action="{{ route('absen.index') }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                        @foreach($lokals as $lokal)
                        <option value="{{ $lokal->id }}" {{ request('kelas') == $lokal->id ? 'selected' : '' }}>
                            {{ $lokal->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="date" name="tanggal_absen" class="form-control" value="{{ request('tanggal_absen') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Guru</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataabsen as $absen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absen->siswa->nama }}</td>
                    <td>{{ $absen->siswa->lokal->nama }}</td>
                    <td>{{ $absen->status }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->jam_masuk }}</td>
                    <td>{{ $absen->guru->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection