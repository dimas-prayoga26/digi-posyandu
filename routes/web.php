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
Route::get('admin','PageController@admin');
Route::get('profil','PageController@profil');
Route::get('kader','PageController@kader');
Route::get('bidan','PageController@bidan');
Route::get('vaksinasi','PageController@vaksinasi');
Route::get('imunisasi','PageController@imunisasi');
Route::get('gizi','PageController@gizi');
Route::get('puskesmas','PageController@puskesmas');
Route::get('posyandu','PageController@posyandu');
Route::get('loginadmin','LoginController@loginadmin');

Route::get('loginbidan','LoginController@loginbidan');

Route::get('TambahKader','UserController@create');


