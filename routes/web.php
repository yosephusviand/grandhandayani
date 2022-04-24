<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.index');
    // return view('admin.indexlucid');
});

Auth::routes();

Route::get('generate-pdf/{id}', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('pdf');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/rumah', [App\Http\Controllers\RumahController::class, 'index'])->name('rumah');
Route::post('/rumah/simpan', [App\Http\Controllers\RumahController::class, 'store'])->name('rumah.store');
Route::post('/rumah/edit', [App\Http\Controllers\RumahController::class, 'edit'])->name('rumah.edit');
Route::get('/rumah/delete/{id}', [App\Http\Controllers\RumahController::class, 'destroy'])->name('rumah.destroy');

Route::get('/warga', [App\Http\Controllers\WargaController::class, 'index'])->name('warga');
Route::post('/warga/simpan', [App\Http\Controllers\WargaController::class, 'store'])->name('warga.store');
Route::post('/warga/edit', [App\Http\Controllers\WargaController::class, 'edit'])->name('warga.edit');
Route::get('/warga/delete/{id}', [App\Http\Controllers\WargaController::class, 'destroy'])->name('warga.destroy');

Route::get('/jimpitan', [App\Http\Controllers\JimpitanController::class, 'index'])->name('jimpitan');
Route::post('/jimpitan/simpan', [App\Http\Controllers\JimpitanController::class, 'store'])->name('jimpitan.store');
Route::post('/jimpitan/edit', [App\Http\Controllers\JimpitanController::class, 'edit'])->name('jimpitan.edit');
Route::get('/jimpitan/delete/{id}', [App\Http\Controllers\JimpitanController::class, 'destroy'])->name('jimpitan.destroy');
Route::post('/jimpitan/cahrt', [App\Http\Controllers\JimpitanController::class, 'chart'])->name('jimpitan.chart');
Route::post('/jimpitan/bulan', [App\Http\Controllers\JimpitanController::class, 'chartbulan'])->name('jimpitan.chartbulan');
Route::post('/jimpitan/tanggal', [App\Http\Controllers\JimpitanController::class, 'tgljimpitan'])->name('jimpitan.tgljimpitan');

Route::get('/rondaa',[App\Http\Controllers\RondaController::class, 'index'])->name('rondaa');
Route::post('/rondaa/simpan', [App\Http\Controllers\RondaController::class, 'store'])->name('rondaa.store');
Route::post('/rondaa/edit', [App\Http\Controllers\RondaController::class, 'edit'])->name('rondaa.edit');
Route::get('/rondaa/delete/{id}', [App\Http\Controllers\RondaController::class, 'destroy'])->name('rondaa.destroy');

Route::get('/ronda', [App\Http\Controllers\UmumController::class,'ronda'])->name('ronda');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/deleted/{id}', [\App\Http\Controllers\ProfileController::class, 'delete'])->name('profile.delete');
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::post('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::get('laporan',[\App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
Route::get('laporan/qrcode', [\App\Http\Controllers\LaporanController::class, 'PDFQrcode'])->name('laporan.qrcode');
Route::post('laporan/kosong',[\App\Http\Controllers\PDFController::class,'kosong'])->name('laporan.kosong');

Route::get('keuangan',[\App\Http\Controllers\KeuanganController::class, 'index'])->name('keuangan.index');
Route::get('keuangan/pengeluaran',[\App\Http\Controllers\KeuanganController::class, 'pengeluaran'])->name('pengeluaran.index');
Route::get('keuangan/lainlain',[\App\Http\Controllers\KeuanganController::class, 'lainlain'])->name('lainlain.index');
Route::get('/keuangan/foto/{id}',[\App\Http\Controllers\KeuanganController::class, 'foto'])->name('keuangan.foto');
Route::get('/keuangan/deleted/{id}', [\App\Http\Controllers\KeuanganController::class, 'deletebulan'])->name('keuangan.deletejimpitan');
Route::get('/keuangan/deleted/pengeluaran/{id}', [\App\Http\Controllers\KeuanganController::class, 'deletepengeluaran'])->name('keuangan.deletepengeluaran');
Route::post('/keuangan/bulan', [App\Http\Controllers\KeuanganController::class, 'bulanjimpitan'])->name('keuangan.bulanjimpitan');
Route::post('/keuangan/storejimpitan', [App\Http\Controllers\KeuanganController::class, 'storejimpitan'])->name('keuangan.storejimpitan');
Route::post('/keuangan/editbulan', [\App\Http\Controllers\KeuanganController::class, 'bulanedit'])->name('keuangan.bulanedit');
Route::post('/keuangan/storepengeluaran', [\App\Http\Controllers\KeuanganController::class, 'storepengeluaran'])->name('keuangan.storepengeluaran');