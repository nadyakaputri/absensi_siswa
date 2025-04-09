<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Middleware\Authenticate;
// use App\Http\Controllers\SiswaController;
// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk dashboard
Route::get('/kaiadmin', function () {
    return view('index', [
        "menu" => "Dashboard"
    ]);
})->name('dashboard');

// Rute untuk login
Route::post('/login', [LoginController::class,'authenticate'])->name('auth');
Route::get('/login', [LoginController::class,'loginView'])->name('login');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');