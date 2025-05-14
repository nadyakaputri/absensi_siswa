<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan  = jurusan::all();
        return view('Admin.jurusan.index', 
        [
            "menu" => "jurusan"
            , "jurusan" => $jurusan
        ]);
    }

    public function create()
    {
        return view('Admin.jurusan.create', 
        [
            "menu"=> "jurusan"
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
        ]);

        $data_baru = new jurusan();
        $data_baru->nama = $validasi['nama'];
        $data_baru->save();

        return redirect()->route('jurusan.index');
    }

    public function edit($id)
    {
        $jurusan = jurusan::find($id);
        return view('Admin.jurusan.edit', 
        [
            "menu" => "jurusan"
            , "jurusan" => $jurusan
        ]);
    }

    public function update($id)
    {
        $validasi =request()->validate([
        
            'nama' => 'required',
        ]);
        
        $jurusan = jurusan::find($id);
        $jurusan->nama = $validasi['nama'];
        $jurusan->save();
        // dd('ok');

        return redirect()->route('jurusan.index');
    }
    public function destroy($id)
    {
        $jurusan = jurusan::find($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index');
    }
}