<?php

use Illuminate\Support\Facades\Route;

// Gunakan huruf besar 'Kantor' sesuai dengan namespace Controller
use App\Http\Controllers\Kantor\Dashboard_Controller;
use App\Http\Controllers\Kantor\Absensi_Controller;
use App\Http\Controllers\Kantor\DataPegawai_Controller;
use App\Http\Controllers\Kantor\DataKantor_Controller;
use App\Http\Controllers\Kantor\Laporan_Controller;
use App\Http\Controllers\Kantor\Pengaturan_Controller;
use App\Http\Controllers\Kantor\RekapAbsensi_Controller;
use App\Http\Controllers\Kantor\ShiftKerja_Controller;
use App\Http\Controllers\Kantor\JadwalKerja_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('admin-kantor.dashboard');
});

Route::get('/login', function () {
    return view('admin-kantor.auth.login');
})->name('login');

// Kantor Admin Routes
Route::prefix('kantor')->name('admin-kantor.')->group(function () {
    Route::get('/dashboard', [Dashboard_Controller::class, 'index'])->name('dashboard');
    Route::get('/absensi', [Absensi_Controller::class, 'index'])->name('absensi');
    Route::get('/data-pegawai', [DataPegawai_Controller:: class, 'index'])->name('data-pegawai');
     Route::get('/data-pegawai/detail', [DataPegawai_Controller:: class, 'detail'])->name('data-pegawai.detail');
    Route::get('/data-kantor', [DataKantor_Controller::class, 'index'])->name('data-kantor');
    Route::get('/rekap-absensi', [RekapAbsensi_Controller:: class, 'index'])->name('rekap-absensi');
    Route::get('/laporan', [Laporan_Controller::class, 'index'])->name('laporan');
    Route::get('/shift-kerja', [ShiftKerja_Controller::class, 'index'])->name('shift-kerja');
    Route::get('/pengaturan', [Pengaturan_Controller:: class, 'index'])->name('pengaturan');
    Route::get('/jadwal-kerja', [JadwalKerja_Controller:: class, 'index'])->name('jadwal-kerja');
});

// Auth Routes
Route::post('/logout', function () {
    return redirect('/login');
})->name('logout');