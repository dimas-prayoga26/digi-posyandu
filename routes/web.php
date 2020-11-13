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

Route::get('dashboard','PageController@dashboard');
Route::get('profil','PageController@profil');

// Route Kader Penanggung Jawab
Route::get('kader','UserController@kader');
Route::post('add_kader','UserController@createKader');
Route::put('editkader/{id}','UserController@update');
Route::delete('deletekeder/{id}','UserController@delete');

// Route Admin Puskesmas
Route::get('admin_puskesmas','AdminController@adminpuskesmas');
Route::post('add_adminpuskes','AdminController@create');
Route::put('editadminpuskes/{id}','AdminController@update');
Route::delete('deleteadminpuskes/{id}','AdminController@delete');

// Route Bidan Desa
Route::get('bidan','UserController@bidan');
<<<<<<< HEAD
Route::post('add_bidan','UserController@createBidan');
Route::put('editbidan/{id}','UserController@update');
Route::delete('deletebidan/{id}','UserController@delete');

Route::get('vaksinasi','VaksinasiController@vaksinasi');
=======
Route::get('vaksinasi','VaksinasiController@index');
Route::post('addVaksinasi', 'VaksinasiController@create');
Route::put('editVaksinasi/{id}','VaksinasiController@update');
Route::delete('deleteVaksinasi/{id}','VaksinasiController@delete');
>>>>>>> 6beb22964af9b59391ad3f88c3cbeb7998392191
Route::get('imunisasi','ImunisasiController@imunisasi');
Route::get('gizi','GiziController@gizi');

//================================== Puskesmas=================================
Route::get('puskesmas','PuskesmasController@index');
Route::post('addPuskesmas', 'PuskesmasController@create');
Route::put('editPuskesmas/{id}','PuskesmasController@update');
Route::delete('deletePuskesmas/{id}','PuskesmasController@delete');


Route::get('posyandu','PosyanduController@posyandu');
Route::post('addPosyandu','PosyanduController@create');
Route::put('editPosyandu/{id}','PosyanduController@update');
Route::delete('deletePosyandu/{id}','PosyanduController@delete');
Route::get('posyandu','PosyanduController@posyandu');
Route::get('jadwal', 'JadwalController@index');
Route::get('login/admin','LoginController@loginadmin');
Route::get('login/bidan','LoginController@loginbidan');

Route::post('login/adminPost', 'LoginController@loginAdminPost');
Route::post('addJadwal', 'JadwalController@create');


