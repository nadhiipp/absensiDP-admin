<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kantor\Dashboard_Controller;
use App\Http\Controllers\Kantor\DataKantor_Controller;
use App\Http\Controllers\Kantor\Pegawai_Controller;
use App\Http\Controllers\Kantor\Laporan_Controller;
use App\Http\Controllers\Kantor\Pengaturan_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route:: get('/', function () {
    return redirect()->route('admin-kantor.dashboard');
});

// Kantor Admin Routes
Route::prefix('kantor')->name('admin-kantor.')->group(function () {
    Route::get('/dashboard', [Dashboard_Controller::class, 'index'])->name('dashboard');
    Route::get('/data-kantor', [DataKantor_Controller::class, 'index'])->name('data-kantor');
    Route::get('/pegawai', [Pegawai_Controller:: class, 'index'])->name('pegawai');
    Route::get('/laporan', [Laporan_Controller::class, 'index'])->name('laporan');
    Route::get('/pengaturan', [Pengaturan_Controller:: class, 'index'])->name('pengaturan');
});

// Auth Routes
Route::post('/logout', function () {
    // Logout logic here
    return redirect('/');
})->name('logout');