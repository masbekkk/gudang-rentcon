<?php

namespace App\Http\Controllers;

use App\Models\BarangSuratJalan;
use Illuminate\Http\Request;

class BarangSuratJalanController extends Controller
{
    public function store(Request $request) 
    {
        $data = new BarangSuratJalan();
    }
}
