<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokalController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use Illuminate\Auth\Middleware\Authenticate;
// use App\Http\Controllers\SiswaController;
// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk dashboard


// Rute untuk login
Route::post('/login', [LoginController::class,'authenticate'])->name('auth');
Route::get('/login', [LoginController::class,'loginView'])->name('login');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');

Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.delete');
Route::get('/guru/{id}/show', [GuruController::class, 'show'])->name('guru.show');


Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');
Route::get('/siswa/{id}/show', [SiswaController::class, 'show'])->name('siswa.show');


Route::get('/lokal', [LokalController::class, 'index'])->name('lokal.index');
Route::get('/lokal/create', [LokalController::class, 'create'])->name('lokal.create');
Route::post('/lokal/store', [LokalController::class, 'store'])->name('lokal.store');
Route::get('/lokal/edit/{id}', [LokalController::class, 'edit'])->name('lokal.edit');
Route::put('/lokal/update/{id}', [LokalController::class, 'update'])->name('lokal.update');

Route::get('/dashboardAdmin', function () {
    return view('index', [
        "menu" => "dashboard" // Ensure $menu is defined here
    ]);
})->name('dashboard');
// Rute untuk dashboard
Route::get('/dashboardGuru', function () {
    return view('Guru.index', [
        "menu" => "dashboard" // Ensure $menu is defined here
    ]);
})->name('dashboard-guru');
Route::get('/dashboardSiswa', function () {
    return view('Siswa.index', [
        "menu" => "dashboard" // Ensure $menu is defined here
    ]);
})->name('dashboard-siswa');

Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
Route::get('/absen/create', [AbsenController::class, 'create'])->name('absen.create');
Route::post('/absen/update-status', [AbsenController::class, 'updateStatus'])->name('absen.updateStatus');

Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');