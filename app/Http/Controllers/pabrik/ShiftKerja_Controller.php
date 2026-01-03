<?php

namespace App\Http\Controllers\Pabrik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShiftKerja_Controller extends Controller
{
     public function index()
    {
        return view('admin-pabrik.shift-kerja');
    }
}
