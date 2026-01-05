<?php

namespace App\Http\Controllers\Pabrik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPabrik_Controller extends Controller
{
    public function index()
    {
        return view('admin-pabrik.data-pabrik');
    }
}
