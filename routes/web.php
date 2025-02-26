<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/kaiadmin',function()
 {
  return view ('index',[
    "menu"=>"Dashboard"
  ]);})->name('dashboard');

  Route::get('/login', function () {
    return view('login');
})->name('login');