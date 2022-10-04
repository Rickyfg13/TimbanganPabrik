<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrukController;
use App\Http\Controllers\TimbangController;
use App\Http\Controllers\AfdelingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimbangLapanganController;

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


Route::resource('truk', TrukController::class);
Route::resource('afdeling', AfdelingController::class);
Route::resource('timbang', TimbangController::class);
Route::resource('timbanglapangan', TimbangLapanganController::class);

//laporan
Route::get('cetak',[TimbangController::class,'cetakForm'])->name('cetak');

Route::post('cetak/filter',[TimbangController::class,'filterTgl'])->name('filter_tanggal');

Route::get('print',[TimbangController::class,'printSelisihTimbang'])->name('printSelisihTimbang');




Route::get('/dashboard',[DashboardController::class,'index']);




Route::get('/', function () {
    return view('home');
});
