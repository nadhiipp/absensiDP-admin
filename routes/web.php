<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\kantor\Dashboard_Controller;
use App\Http\Controllers\kantor\Absensi_Controller;
use App\Http\Controllers\kantor\DataPegawai_Controller;
use App\Http\Controllers\kantor\DataKantor_Controller;
use App\Http\Controllers\kantor\Laporan_Controller;
use App\Http\Controllers\kantor\Pengaturan_Controller;
use App\Http\Controllers\kantor\RekapAbsensi_Controller;
use App\Http\Controllers\kantor\ShiftKerja_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('admin-kantor.dashboard');
});

// kantor Admin Routes
Route::prefix('kantor')->name('admin-kantor.')->group(function () {
    Route::get('/dashboard', [Dashboard_Controller::class, 'index'])->name('dashboard');
    Route::get('/absensi', [Absensi_Controller::class, 'index'])->name('absensi');
    Route::get('/data-pegawai', [DataPegawai_Controller::class, 'index'])->name('data-pegawai');
    Route::get('/data-kantor', [DataKantor_Controller::class, 'index'])->name('data-kantor');
    Route::get('/rekap-absensi', [RekapAbsensi_Controller:: class, 'index'])->name('rekap-absensi');
    Route::get('/laporan', [Laporan_Controller::class, 'index'])->name('laporan');
    Route::get('/shift-kerja', [ShiftKerja_Controller::class, 'index'])->name('shift-kerja');
    Route::get('/pengaturan', [Pengaturan_Controller:: class, 'index'])->name('pengaturan');
});

// Auth Routes
Route::post('/logout', function () {
    return redirect('/');
})->name('logout');