<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\absen;
use App\Models\Lokal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index(Request $request)
{
    $query = absen::with(['siswa', 'guru']);

    if ($request->has('kelas') && $request->kelas != '') {
        $query->whereHas('siswa', function ($q) use ($request) {
            $q->where('id_lokal', $request->kelas);
        });
    }

    if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
        $query->whereDate('tanggal', $request->tanggal_absen);
    }

    $dataabsen = $query->get();
    $lokals = Lokal::all();

    return view('Guru.absen.index', [
        'menu' => 'absen',
        'title' => 'Data Absen',
        'dataabsen' => $dataabsen,
        'lokals' => $lokals
    ]);
}

public function create(Request $request)
{
    $query = Siswa::with('lokal');

    if ($request->has('kelas') && $request->kelas != '') {
        $query->where('id_lokal', $request->kelas);
    }

    $datasiswa = $query->get();
    $lokals = Lokal::all();

    return view('Guru.absen.create', [
        'menu' => 'absen',
        'title' => 'Absen Siswa',
        'datasiswa' => $datasiswa,
        'lokals' => $lokals
    ]);
}

public function updateStatus(Request $request)
{
    
    $request->validate([
        'status' => 'required|array',
        'status.*' => 'in:Hadir,Izin,Sakit,Alpa',
    ]);

    $statuses = $request->input('status', []);
    $currentDate = now()->toDateString();
    $currentTime = now()->toTimeString();
    $guru = Guru::where('user_id', Auth::id())->first();

    if (!$guru) {
        return redirect()->route('absen.create')->with('error', 'Guru tidak ditemukan. Pastikan data guru sudah terdaftar.');
    }

    foreach ($statuses as $id => $status) {
        $absen = absen::create([
            'tanggal' => $currentDate,
            'jam_masuk' => $currentTime,
            'jam_pulang' => $currentTime,
            'status' => $status,
            'guru_id' => $guru->id,
            'siswa_id' => $id,
        ]);
    
    }

    return redirect()->route('absen.index')->with('success', 'Data absensi berhasil disimpan.');
}
}
