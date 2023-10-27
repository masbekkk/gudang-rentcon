<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BarangController extends Controller
{
    public function index()
    {
        return view('admin.barang');
    }

    public function store(Request $request)
    {
        // try{
        $inputData = [
            'nama_mesin' => $request->nama_mesin,
            'lokasi_mesin' => $request->lokasi_mesin,
            'kondisi_mesin' => $request->kondisi_mesin,
            'spesifikasi_mesin' => $request->spesifikasi_mesin,
        ];

        $barang = Barang::create($inputData);
        Cache::forever('barang-' . $barang->id, $inputData);
       
        return response()->json(['message' => 'Data Barang Berhasil Ditambahkan!'], 200);
    // }catch {

    // }

        
    }

    public function update($id, Request $request)
    {
        // dd("okee");
        $barang = Barang::findOrFail($id);
        $inputData = [
            'nama_mesin' => $request->nama_mesin_edit,
            'lokasi_mesin' => $request->lokasi_mesin_edit,
            'kondisi_mesin' => $request->kondisi_mesin_edit,
            'spesifikasi_mesin' => $request->spesifikasi_mesin_edit,
        ];
        Barang::findOrFail($id)->update($inputData);
        // $barang = Barang::create($inputData);
        Cache::forever('barang-' . $barang->id, $inputData);
        // $barang->nama_mesin = $request->nama_mesin_edit;
        // $barang->lokasi_mesin = $request->lokasi_mesin_edit;
        // $barang->kondisi_mesin = $request->kondisi_mesin_edit;
        // $barang->spesifikasi_mesin = $request->spesifikasi_mesin_edit;
        // $barang->save();

        return response()->json(['message' => 'Data Barang Berhasil Diperbarui!'], 200);
        
        // Barang::where('id', $barang->id)->update('')
    }

    public function destroy($id)
    {
       Barang::findOrFail($id)->delete();
       return response()->json(['message' => 'Data Barang Berhasil Dihapus!'], 200);
    }

    function qrScanResult($id)
    {
        $cacheBarang = Cache::get('barang-' . $id);
        // dd($cacheBarang);
        if ($cacheBarang == null) {
            $barang = Barang::findOrFail($id);
            $dataBarang = [
                'nama_mesin' => $barang->nama_mesin,
                'lokasi_mesin' => $barang->lokasi_mesin,
                'kondisi_mesin' => $barang->kondisi_mesin,
                'spesifikasi_mesin' => $barang->spesifikasi_mesin,
            ];
            $cacheBarang = $barang;
            Cache::forever('barang-' . $barang->id, $barang);
            
            // return to view with cache or if null return from model
        }

        return view('info-barang', $cacheBarang);
    }
}
