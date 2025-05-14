<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lokal;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('lokal')->get(); // Load the 'lokal' relationship
        return view('Admin.siswa.index', [
            "menu" => "siswa",
            'title' => 'Data siswa',
            'siswa' => $siswa
        ]);
    }

    public function create()
    {
        $lokal = lokal::all();
        return view('Admin.siswa.create', [
            'menu' => 'siswa',
            'title' => 'Tambah Data Siswa',
            'lokal' => $lokal
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'NISN' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'JK' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'lokal_id' => 'required', // Ensure lokal_id is required if necessary
        ], [
            'NISN.required' => 'NISN Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'nohp.required' => 'Nomor HP Harus Diisi',
            'JK.required' => 'Jenis Kelamin Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'lokal_id.required' => 'Kelas Harus Dipilih',
        ]);
        
        $user = new User();
        $user->name = 'siswa';
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'siswa';
        $user->save();


        $siswa = new Siswa;
        $siswa->NISN = $validasi['NISN'];
        $siswa->nama = $validasi['nama'];
        $siswa->alamat = $validasi['alamat'];
        $siswa->nohp = $validasi['nohp'];
        $siswa->JK = $validasi['JK'];
        $siswa->username = $validasi['username'];
        $siswa->password = bcrypt($validasi['password']);
        $siswa->user_id = $user->id;
        $siswa->lokal_id = $validasi['lokal_id'];
        $siswa->save();
        return redirect(route('siswa'));
    }

    public function show($id)
    {

        $siswa = Siswa::find($id);
        $lokal = Lokal::all(); // Ensure Lokal model is imported and data is fetched

        return view('Admin.Siswa.view', [
            'menu' => 'siswa',
            'title' => 'Detail Data siswa',
            'siswa' => $siswa,
            'lokal' => $lokal
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::with('lokal')->find($id); // Corrected from 'lokals' to 'lokal'
        $lokal = Lokal::all();
        return view('Admin.Siswa.edit', [
            'menu' => 'siswa',
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'lokal' => $lokal
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'NISN' => 'nullable',
            'nama' => 'nullable',
            'alamat' => 'required',
            'nohp' => 'nullable',
            'JK' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'nullable',
            'lokal_id' => 'nullable'
        ]);


        $siswa = siswa::find($id);
        if (!$siswa) {
            return redirect(route('siswa'))->with('error', 'Siswa not found.');
        }
        $siswa->NISN = $validasi['NISN'] ?? $siswa->NISN;
        $siswa->nama = $validasi['nama'] ?? $siswa->nama;
        $siswa->alamat = $validasi['alamat'] ?? $siswa->alamat;
        $siswa->nohp = $validasi['nohp'] ?? $siswa->nohp;
        $siswa->JK = $validasi['JK'] ?? $siswa->JK;
        $siswa->username = $validasi['username'] ?? $siswa->username;
        if ($request->filled('password')) {
            $siswa->password = $validasi['password'];
        }
        $siswa->user_id = $validasi['user_id'] ?? $siswa->user_id;
        $siswa->lokal_id = $validasi['lokal_id'] ?? $siswa->lokal_id;
        $siswa->save();

        return redirect(route('siswa'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect(route('siswa'));
    }
}