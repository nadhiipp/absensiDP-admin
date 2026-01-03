<?php

namespace App\Http\Controllers\Pabrik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPegawai_Controller extends Controller
{
    public function index()
    {
        return view('admin-pabrik.data-pegawai');
    }
}
