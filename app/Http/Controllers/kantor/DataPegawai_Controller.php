<?php

namespace App\Http\Controllers\Kantor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPegawai_Controller extends Controller
{
    public function index()
    {
        return view('admin-kantor.pegawai.data-pegawai');
    }
    public function detail()
    {
        return view('admin-kantor.pegawai.detail');
    }
}
