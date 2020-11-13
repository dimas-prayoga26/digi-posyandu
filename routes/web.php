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
Route::get('kader','UserController@kader');
Route::get('tambahkader','UserController@tambahkader');
Route::get('admin_puskesmas','AdminController@adminpuskesmas');
Route::get('bidan','UserController@bidan');
Route::get('vaksinasi','VaksinasiController@vaksinasi');
Route::get('imunisasi','ImunisasiController@imunisasi');
Route::get('gizi','GiziController@gizi');

//================================== Puskesmas=================================
Route::get('puskesmas','PuskesmasController@index');
Route::post('addPuskesmas', 'PuskesmasController@create');
Route::put('editPuskesmas/{id}','PuskesmasController@update');
Route::delete('deletePuskesmas/{id}','PuskesmasController@delete');


Route::get('posyandu','PosyanduController@posyandu');

Route::get('login/admin','LoginController@loginadmin');
Route::get('login/bidan','LoginController@loginbidan');



