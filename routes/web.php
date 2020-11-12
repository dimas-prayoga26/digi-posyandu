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
Route::get('admin/admin_puskesmas/admin_puskesmas','AdminController@adminpuskesmas');
Route::get('profil','PageController@profil');
Route::get('admin/kader/kader','UserController@kader');
Route::get('admin/kader/tambah','UserController@tambahkader');

Route::get('admin/bidan/bidan','UserController@bidan');
Route::get('admin/vaksinasi/vaksinasi','VaksinasiController@vaksinasi');
Route::get('admin/imunisasi/imunisasi','ImunisasiController@imunisasi');
Route::get('admin/gizi/gizi','GiziController@gizi');
Route::get('admin/puskesmas/puskesmas','PuskesmasController@puskesmas');
Route::get('admin/posyandu/posyandu','PosyanduController@posyandu');



Route::get('loginadmin','LoginController@loginadmin');
Route::get('loginbidan','LoginController@loginbidan');



