<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin-sekolah.dashboard');
    }
}
