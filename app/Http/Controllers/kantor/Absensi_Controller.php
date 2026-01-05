<?php

namespace App\Http\Controllers\kantor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Absensi_Controller extends Controller
{
    public function index()
    {
        return view('admin-kantor.absensi');
    }
}
