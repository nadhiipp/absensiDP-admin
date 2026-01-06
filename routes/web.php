<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sekolah\AdminDashboardController;
use App\Http\Controllers\Sekolah\AdminAbsensiController;
use App\Http\Controllers\Sekolah\AdminMasterController;
use App\Http\Controllers\Sekolah\AdminLaporanController;

// ======================
// REDIRECT ROOT URL
// ======================
Route::redirect('/', '/admin/dashboard');
Route::redirect('/home', '/admin/dashboard');

// ======================
// ADMIN ROUTES
// ======================
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Absensi
        Route::get('/absensi-today', [AdminAbsensiController::class, 'today'])
            ->name('absensi.today');

        // Master Data
        Route::get('/data-kelas', [AdminMasterController::class, 'kelas'])
            ->name('data.kelas');

        Route::get('/data-siswa', [AdminMasterController::class, 'siswa'])
            ->name('data.siswa');

        // Laporan
        Route::get('/laporan-absensi', [AdminLaporanController::class, 'laporan'])
            ->name('laporan.absensi');

        Route::get('/riwayat-absensi', [AdminLaporanController::class, 'riwayat'])
            ->name('riwayat.absensi');
    });


Route::fallback(function () {
    return redirect('/admin/dashboard');
});
