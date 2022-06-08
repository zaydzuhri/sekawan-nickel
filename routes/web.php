<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kendaraan', [App\Http\Controllers\KendaraanController::class, 'index'])->name('kendaraan');

Route::get('/kendaraan/tambah', [App\Http\Controllers\KendaraanController::class, 'create'])->name('kendaraan.tambah');
Route::post('/kendaraan', [App\Http\Controllers\KendaraanController::class, 'store']);

Route::get('/pesanan', [App\Http\Controllers\PesananController::class, 'index'])->name('pesanan');

Route::get('/pesanan/input', [App\Http\Controllers\PesananController::class, 'create'])->name('pesanan.input');
Route::post('/pesanan', [App\Http\Controllers\PesananController::class, 'store']);
Route::post('/pesanan/approve/{id}', [App\Http\Controllers\PesananController::class, 'edit']);