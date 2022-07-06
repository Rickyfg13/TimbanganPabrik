<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrukController;
use App\Http\Controllers\AfdelingController;
use App\Http\Controllers\HasilTimbangController;
use App\Http\Controllers\TimbangPabrikController;
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

Route::get('/', function(){
    return view('pages.dashboard');
});

Route::resource('truk', TrukController::class);
Route::resource('hasiltimbang', HasilTimbangController::class);
Route::resource('afdeling', AfdelingController::class);
Route::resource('timbangpabrik', TimbangPabrikController::class);
Route::resource('timbanglapangan', TimbangLapanganController::class);

//laporan
Route::get('laporan',[HasilTimbangController::class,'index']);

