<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;

class AdminMasterController extends Controller
{
    public function kelas()
    {
        return view('admin-sekolah.kelas.data-kelas');
    }

    public function siswa()
    {
        return view('admin-sekolah.siswa.data-siswa');
    }
}
