<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;

class AdminLaporanController extends Controller
{
    public function laporan()
    {
        return view('admin-sekolah.laporan.laporan-absensi');
    }

    public function riwayat()
    {
        return view('admin-sekolah.riwayat.riwayat-absensi');
    }
}
