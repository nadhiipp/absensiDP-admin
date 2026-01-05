<?php

namespace App\Http\Controllers\Kantor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShiftKerja_Controller extends Controller
{
     public function index()
    {
        return view('admin-kantor.shift.shift-kerja');
    }
}
