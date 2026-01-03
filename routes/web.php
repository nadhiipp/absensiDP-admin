<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pabrik\Dashboard_Controller;
use App\Http\Controllers\Pabrik\Absensi_Controller;
use App\Http\Controllers\Pabrik\DataPegawai_Controller;
use App\Http\Controllers\Pabrik\Laporan_Controller;
use App\Http\Controllers\Pabrik\Pengaturan_Controller;
use App\Http\Controllers\Pabrik\RekapAbsensi_Controller;
use App\Http\Controllers\Pabrik\ShiftKerja_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('admin-pabrik.dashboard');
});

// Pabrik Admin Routes
Route::prefix('pabrik')->name('admin-pabrik.')->group(function () {
    Route::get('/dashboard', [Dashboard_Controller::class, 'index'])->name('dashboard');
    Route::get('/absensi', [Absensi_Controller::class, 'index'])->name('absensi');
    Route::get('/data-pegawai', [DataPegawai_Controller::class, 'index'])->name('data-pegawai');
    Route::get('/rekap-absensi', [RekapAbsensi_Controller:: class, 'index'])->name('rekap-absensi');
    Route::get('/laporan', [Laporan_Controller::class, 'index'])->name('laporan');
    Route::get('/shift-kerja', [ShiftKerja_Controller::class, 'index'])->name('shift-kerja');
    Route::get('/pengaturan', [Pengaturan_Controller:: class, 'index'])->name('pengaturan');
});

// Auth Routes
Route::post('/logout', function () {
    return redirect('/');
})->name('logout');