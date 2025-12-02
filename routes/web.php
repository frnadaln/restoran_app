<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PesananController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('pelanggan', PelangganController::class);
Route::resource('meja', MejaController::class);
Route::resource('pesanan', PesananController::class);
Route::get('/', function () {
    return view('dashboard');
});
