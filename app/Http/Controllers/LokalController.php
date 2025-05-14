<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Lokal;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class LokalController extends Controller
{
    //

    public function index()
    {

        $lokal = Lokal::with(['guru', 'jurusan'])->get(); // Fetch data from the Lokal model
        return view('Admin.lokal.index', [
            'menu' => 'lokal',
            'title' => 'Data lokal',
            'lokal' => $lokal
        ]);
    }
    public function create()
    {
        $jurusan = Jurusan::all();
        $guru = Guru::all();
        return view('Admin.lokal.create', [
            'menu' => 'lokal',
            'title' => 'Tambah Data lokal',
            'jurusan' => $jurusan,
            'guru' => $guru
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'guru_id' => 'required',
        ], [
            'nama.required' => 'Nama lokal harus diisi',
            'jurusan_id.required' => 'Jurusan harus dipilih',
            'guru_id.required' => 'Guru harus dipilih',
        ]);


        $lokal = new lokal;
        $lokal->nama = $validasi['nama'];
        $lokal->jurusan_id = $validasi['jurusan_id'];
        $lokal->guru_id = $validasi['guru_id'];
        $lokal->save();
        return redirect(route('lokal.index')); // Corrected from 'guru.index' to 'guru'
    }

    public function edit($id)
    {
        $lokal = Lokal::findOrFail($id);
        $jurusan = Jurusan::all();
        $guru = Guru::all();
        return view('Admin.lokal.edit', [
            'menu' => 'lokal',
            'title' => 'Edit Data lokal',
            'lokal' => $lokal,
            'jurusan' => $jurusan,
            'guru' => $guru
        ]);
    }
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'guru_id' => 'required',
        ], [
            'nama.required' => 'Nama lokal harus diisi',
            'jurusan_id.required' => 'Jurusan harus dipilih',
            'guru_id.required' => 'Guru harus dipilih',
        ]);

        $lokal = Lokal::findOrFail($id);
        $lokal->nama = $validasi['nama'];
        $lokal->jurusan_id = $validasi['jurusan_id'];
        $lokal->guru_id = $validasi['guru_id'];
        $lokal->save();
        return redirect(route('lokal.index'));
    }
    public function destroy($id)
    {
        $lokal = Lokal::findOrFail($id);
        $lokal->delete();
        return redirect(route('lokal.index'));
    }
}
