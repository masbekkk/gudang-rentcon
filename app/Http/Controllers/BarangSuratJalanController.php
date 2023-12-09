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

    function destroy($idSuratJalan, $idBarang)
    {
        $dataRelasi = BarangSuratJalan::where('surat_id', $idSuratJalan)->where('barang_id', $idBarang)->delete();
        return response()->json(['message' => 'Data Barang di Surat Jalan Berhasil Dihapus!'], 200);
    }
}
