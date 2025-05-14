<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapController extends Controller
{
    public function index()
    {
        // Ambil data siswa berdasarkan pengguna yang login
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();
        $rekapAbsensi = absen::where('siswa_id', $siswa->id)->with('guru')->get();

        // Kirim data ke view
        return view('Siswa.index', [
            'menu' => 'rekap',
            'title' => 'Rekap Absensi ' . $siswa->nama,
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi
        ]);
    }
}
