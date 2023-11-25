<?php

use App\Http\Controllers\BarangController;
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

Route::get('cetak-surat-jalan/{id}', [SuratJalanController::class, 'printSurat'])->name('print.surat-jalan');
Route::get('pdf-surat-jalan/{id}', [SuratJalanController::class, 'printSuratDomPDF'])->name('print.surat-jalan');

Auth::routes();

Route::get('data-barang', function () {
    return response()->json(['data' => Barang::all()]);
})->name('get.barang');

Route::get('qr-barang/{id}', function ($id) {
    $barang = Barang::findOrFail($id);
    return view('show-qr', [
        'data_qr' => env('APP_URL') . 'info-barang/' . $id,
        'nama_barang' => $barang->nama_mesin
    ]);
});

Route::get('info-barang/{id}', [BarangController::class, 'qrScanResult'])->name('scan.result');

Route::get('data-barang-surat', function () {
    $results = BarangSuratJalan::with('barang', 'suratJalan')->orderBy('surat_id')->get();
    return response()->json(['data' => $results->groupBy('surat_id')]);
})->name('get.barang-surat');

Route::get('data-surat-jalan', function () {
    return response()->json(['data' => SuratJalan::all()], 200);
})->name('get.surat-jalan');

Route::get('barang-by-id-surat/{id}', function ($id) {
    return response()->json(['data' => BarangSuratJalan::where('surat_id', $id)->with('barang')->get()], 200);
});
// Route::middleware('')->name('admin.')->group( function() {

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('surat-jalan', SuratJalanController::class)->middleware('auth');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
