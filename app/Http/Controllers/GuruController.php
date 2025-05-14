<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $dataguru = Guru::all();
        return view('Admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data Guru',
            'dataguru' => $dataguru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.guru.create', [
            'menu' => 'guru',
            'title' => 'Tambah Data Guru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'NIP' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required', // Corrected from 'telp' to 'nohp'
            'JK' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'user_id' => 'nullable',
        ], [
            'NIP.required' => 'NIP Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'nohp.required' => 'Nomor HP Harus Diisi', // Corrected from 'telp' to 'nohp'
            'JK.required' => 'Jenis Kelamin Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);
        
        $user = new User();
        $user->name = $validasi['nama'];
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'guru';
        $user->save();


        $guru = new Guru;
        $guru->NIP = $validasi['NIP'];
        $guru->nama = $validasi['nama'];
        $guru->alamat = $validasi['alamat'];
        $guru->nohp = $validasi['nohp'];
        $guru->JK = $validasi['JK'];
        $guru->username = $validasi['username'];
        $guru->password = bcrypt($validasi['password']);
        $guru->user_id = $user->id;
        $guru->save();
        return redirect(route('guru')); // Corrected from 'guru.index' to 'guru'
    }

public function show($id)
    {
        $guru = Guru::find($id);
        return view('Admin.guru.view', [
            'menu' => 'guru',
            'title' => 'Detail Data Guru',
            'guru' => $guru
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('Admin.guru.edit', [
            'menu' => 'guru',
            'title' => 'Edit Data Guru',
            'guru' => $guru
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'NIP' => 'nullable',
            'nama' => 'nullable',
            'alamat' => 'required',
            'nohp' => 'nullable', // Corrected from 'telp' to 'nohp'
            'JK' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'nullable',
        ]);


        $guru = Guru::find($id);
        $guru->NIP = $validasi['NIP'] ?? $guru->NIP;
        $guru->nama = $validasi['nama'] ?? $guru->nama;
        $guru->alamat = $validasi['alamat'] ?? $guru->alamat;
        $guru->nohp = $validasi['nohp'] ?? $guru->nohp; // Corrected from 'telp' to 'nohp'
        $guru->JK = $validasi['JK'] ?? $guru->JK;
        $guru->username = $validasi['username'] ?? $guru->username;
        if ($request->filled('password')) {
            $guru->password = $validasi['password'];
        }
        $guru->user_id = $validasi['user_id'] ?? $guru->user_id;
        $guru->save();

        return redirect(route('guru')); // Corrected from 'guru.index' to 'guru'
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();
        return redirect(route('guru'));
    }
}
