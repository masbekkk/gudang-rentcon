<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangSuratJalanController;
use App\Http\Controllers\SuratJalanController;
use App\Models\Barang;
use App\Models\BarangSuratJalan;
use App\Models\SuratJalan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('barang.index');
});

Route::get('test/preview-surat-jalan', function() {
    return view('admin.tes-dompdf');
})->name('test.pdf');
Route::get('test/pdf-surat-jalan', [SuratJalanController::class, 'testDOMPDF']);

Route::get('preview-surat-jalan/{id}', [SuratJalanController::class, 'printSurat'])->name('preview.surat-jalan')->middleware('auth');
Route::get('pdf-surat-jalan/{id}', [SuratJalanController::class, 'printSuratDomPDF'])->name('download.surat-jalan');

Auth::routes();

Route::get('qr-barang/{id}', function ($id) {
    $barang = Barang::findOrFail($id);
    return view('show-qr', [
        'data_qr' => env('APP_URL') . 'info-barang/' . $id,
        'nama_barang' => $barang->nama_mesin
    ]);
});

Route::get('info-barang/{id}', [BarangController::class, 'qrScanResult'])->name('scan.result');

Route::get('data-barang', function () {
    return response()->json(['data' => Barang::all()]);
})->name('get.barang')->middleware('auth');

Route::get('data-barang-surat', function () {
    $results = BarangSuratJalan::with('barang', 'suratJalan')->orderBy('surat_id')->get();
    return response()->json(['data' => $results->groupBy('surat_id')]);
})->name('get.barang-surat')->middleware('auth');

Route::get('data-surat-jalan', function () {
    return response()->json(['data' => SuratJalan::all()], 200);
})->name('get.surat-jalan')->middleware('auth');

Route::get('barang-by-id-surat/{id}', function ($id) {
    return response()->json(['data' => BarangSuratJalan::where('surat_id', $id)->with('barang')->get()], 200);
})->middleware('auth');

Route::delete('delete-brg-in-surat/{idSurat}/{idBarang}', [BarangSuratJalanController::class, 'destroy'])->middleware('auth')->name('delete.brgInSurat');

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('surat-jalan', SuratJalanController::class)->middleware('auth');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
