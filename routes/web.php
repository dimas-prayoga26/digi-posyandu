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
    return view('welcome');
});

// Route Dashboard
Route::get('dashboard/chart/gizi','DashboardController@chartGizi');
Route::get('dashboard/chart/imunisasi','DashboardController@chartImunisasi');
Route::get('dashboard','DashboardController@index');

// Route Profile
Route::get('profil','PageController@profil');
Route::put('profil/{id}','PageController@update');

// Route Kader Penanggung Jawab
Route::get('kader','UserController@kader');
Route::post('add_kader','UserController@createKader');
Route::put('editkader/{id}','UserController@updateKader');
Route::delete('deletekeder/{id}','UserController@delete');

// Route Admin Puskesmas
Route::get('admin_puskesmas','AdminController@adminpuskesmas');
Route::post('add_adminpuskes','AdminController@create');
Route::put('editadminpuskes/{id}','AdminController@update');
Route::delete('deleteadminpuskes/{id}','AdminController@delete');

// Route Bidan Desa
Route::get('bidan','UserController@bidan');
Route::post('add_bidan','UserController@createBidan');
Route::put('editbidan/{id}','UserController@updateBidan');
Route::delete('deletebidan/{id}','UserController@delete');

// Route Vaksinasi
Route::get('vaksinasi','VaksinasiController@vaksinasi');
Route::get('vaksinasi','VaksinasiController@index');
Route::post('addVaksinasi', 'VaksinasiController@create');
Route::put('editVaksinasi/{id}','VaksinasiController@update');
Route::delete('deleteVaksinasi/{id}','VaksinasiController@delete');

// Route Gizi
Route::get('gizi','GiziController@index');
Route::get('giziSearch','GiziController@search');
Route::get('/gizi/export_gizi', 'GiziController@export_gizi');
Route::get('/gizi/export_gizi_superadmin', 'GiziController@export_gizi_superadmin');
Route::get('/gizi/export_gizi_bidan', 'GiziController@export_gizi_bidan');

// Route Imunisasi
Route::get('imunisasi','ImunisasiController@index');
Route::get('/imunisasi/exportimunisasi', 'ImunisasiController@export_imunisasi');
Route::get('/imunisasi/export_imunisasi_superadmin', 'ImunisasiController@export_imunisasi_superadmin');
Route::get('/imunisasi/export_imunisasi_bidan', 'ImunisasiController@export_imunisasi_bidan');
Route::get('imunisasiSearch','ImunisasiController@search');


// ================================== Puskesmas=================================
Route::get('puskesmas','PuskesmasController@index');
Route::post('addPuskesmas', 'PuskesmasController@create');
Route::put('editPuskesmas/{id}','PuskesmasController@update');
Route::delete('deletePuskesmas/{id}','PuskesmasController@delete');

// Route posyandu
Route::get('posyandu','PosyanduController@posyandu');
Route::post('addPosyandu','PosyanduController@create');
Route::put('editPosyandu/{id}','PosyanduController@update');
Route::delete('deletePosyandu/{id}','PosyanduController@delete');
Route::get('posyandu','PosyanduController@posyandu');

// Route Jadwal
Route::get('jadwal', 'JadwalController@index');
Route::post('addJadwal', 'JadwalController@create');

// Route Login
Route::get('login/bidan','LoginController@loginbidan');
Route::post('login/bidanPost','LoginController@loginBidanPost');
Route::get('logout/bidan', 'LoginController@logoutBidan');

Route::get('login/admin','LoginController@loginadmin');
Route::post('login/adminPost', 'LoginController@loginAdminPost');
Route::get('logout/admin', 'LoginController@logoutAdmin');



