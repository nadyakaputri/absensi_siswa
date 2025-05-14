@extends('templates-siswa.layout')


@section('content')

<div class="card">
    <h5 class="card-header">Rekap Absensi</h5>
    <div class="card-body">

    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Status</th>
                    <th>Guru</th>
                </tr>
            </thead>
            <tbody>
                <!-- @foreach($rekapAbsensi as $rekap)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekap->tanggal }}</td>
                    <td>{{ $rekap->jam_masuk }}</td>
                    <td>{{ $rekap->jam_pulang }}</td>
                    <td>{{ $rekap->status }}</td>
                    <td>{{ $rekap->guru->nama }}</td>
                </tr>
                @endforeach -->
            </tbody>
        </table>
    </div>
</div>
@endsection