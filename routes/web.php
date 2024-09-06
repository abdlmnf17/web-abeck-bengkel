<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;

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
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user
Route::resource('/user', 'userController');

Route::get('/user/hapus/{id}', 'userController@destroy');

//Barang
Route::resource('/barang', 'barangController');
Route::get('/barang/hapus/{id}', 'barangController@destroy');

//Pelanggan
Route::resource('/pelanggan', 'pelangganController');
Route::get('/pelanggan/hapus/{id}', 'pelangganController@destroy');

//Data Akun
Route::resource('/akun', 'akunController');
Route::get('/akun/hapus/{kode}', 'akunController@destroy');
Route::get('/akun/edit/{kode}', 'akunController@edit');

//Setting Akun
Route::get('/setting', 'settingcontroller@index')->name('setting.transaksi');
Route::post('/setting/simpan', 'SettingController@simpan');

//Penjualan
Route::get('/transaksi', 'PenjualanController@index')->name('penjualan.transaksi');
Route::post('/sem/store', 'PenjualanController@store')->name('penjualan.store');
Route::get('/transaksi/hapus/{kd_brg}', 'PenjualanController@destroy');

//Detail Jual
Route::post('/detail/store', 'DetailJualController@store');
Route::post('/detail/simpan', 'DetailJualController@simpan');

//Pendapatan
Route::get('/pendapatan', 'PendapatanController@index')->name('pendapatan.transaksi');
Route::get('/pendapatan-hasil/{id}', 'PendapatanController@edit');
Route::post('/pendapatan/simpan', 'PendapatanController@simpan');

//Laporan
Route::resource('/laporan', 'LaporanController');

//laporan cetak
Route::get('/laporancetak/cetak_pdf', 'LaporanController@cetak_pdf');
Route::resource('/bukubesar', 'bukubesarController');
