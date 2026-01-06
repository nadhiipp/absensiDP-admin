<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;

class AdminAbsensiController extends Controller
{
    public function today()
    {
        return view('admin-sekolah.absensi.absensi-today');
    }
}
