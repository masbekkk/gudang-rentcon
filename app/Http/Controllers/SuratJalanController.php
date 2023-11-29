<?php

namespace App\Http\Controllers;

use App\Models\BarangSuratJalan;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use PDF;

class SuratJalanController extends Controller
{
    function index() {
        return view('admin.surat-jalan');
    }

    function store(Request $request)
    {
        $dataSuratJalan = new SuratJalan();
        $dataSuratJalan->penerima = $request->penerima;
        $dataSuratJalan->alamat_penerima = $request->alamat_penerima;
        $dataSuratJalan->kab_prov_penerima = $request->kab_prov_penerima;
        $dataSuratJalan->pic_penerima = $request->pic_penerima;
        $dataSuratJalan->no_referensi = $request->no_referensi;
        $dataSuratJalan->tanggal = $request->tanggal;
        $dataSuratJalan->pesan = $request->pesan;
        $dataSuratJalan->disiapkan = $request->disiapkan;
        $dataSuratJalan->dikirim = $request->dikirim;
        $dataSuratJalan->diterima = $request->diterima;
        // dd($request->{'barang_' . 1});
        if ($dataSuratJalan->save()) {
            $this->storeBarangSuratJalan($dataSuratJalan->id, $request);
            return response()->json(['message' => 'Data Surat Jalan Berhasil Ditambahkan!'], 200);
        }else {
            return response()->json(['error' => 'Data Surat Jalan Gagal Ditambahkan!'], 400);
        }

    }

    private function storeBarangSuratJalan($idSuratJalan, Request $request)
    {
        for($i = 1; $i < $request->jml_barang; $i++) {
            if($request->{'barang_' . $i} != null) {
                $dataRelasi = new BarangSuratJalan();
                $dataRelasi->barang_id = $request->{'barang_' . $i};
                $dataRelasi->surat_id = $idSuratJalan;
                $dataRelasi->lama_sewa = $request->{'lama_sewa_' . $i};
                $dataRelasi->jumlah_barang = $request->{'jml_brg_' . $i};
                $dataRelasi->save();
            }
        }
    }

    function printSurat($id) {
        $data = SuratJalan::findOrFail($id);
        $barangSuratJalan = BarangSuratJalan::where('surat_id', $id)->with('barang')->get();
        return view('admin.tes-dompdf', ['data' => $data, 'barangSuratJalan' => $barangSuratJalan]);
    }

    function printSuratDomPDF($id) {
        $data = SuratJalan::findOrFail($id);
        $barangSuratJalan = BarangSuratJalan::where('surat_id', $id)->with('barang')->get();

        $pdfFile = PDF::loadView('admin.tes-dompdf', [
            'data' => $data, 
            'barangSuratJalan' => $barangSuratJalan
        ]);
        // $pdfFile->setPaper('a4', 'potrati'); 
        return $pdfFile->download("Surat Jalan No. Referensi: " . $data->no_referensi . ".pdf");
    }

    function testDOMPDF() {
        $pdfFile = PDF::loadView('admin.tes-dompdf', [
            // 'data' => $data, 
            // 'barangSuratJalan' => $barangSuratJalan
        ]);
        // $pdfFile->setPaper('a4', 'potrati'); 
        return $pdfFile->download("Surat Jalan No. Referensi.pdf");
    }

    function destroy($id)
    {
        SuratJalan::findOrFail($id)->delete();
        return response()->json(['message' => 'Data Surat Jalan Berhasil Dihapus!'], 200);
    }
}
