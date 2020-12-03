<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ------    Kader    --------
Route::post("/Login", "API\KaderApiController@login");
Route::get('/profile/{id}', 'API\KaderApiController@show');
Route::put('/edit-profile/{id}', 'API\KaderApiController@update');

// ------    Anak    --------
Route::get('/getAnak', 'API\AnakApiController@getAll');
Route::get('/getAnakByPosyandu/{id}', 'API\AnakApiController@showByPosyandu');
Route::post('/anak', 'API\AnakApiController@create');
Route::get('/detail-anak/{id}', 'API\AnakApiController@show');
Route::post('/edit-anak/{id}', 'API\AnakApiController@update');

// ------    Gizi    --------
Route::get('/getGizi', 'API\GiziApiController@getAll');
Route::get('/getGiziPuskes/{id}', 'API\GiziApiController@getByPuskes');
Route::get('/getGiziByPosyandu/{id}', 'API\GiziApiController@getByPosyandu');
Route::post('/add-gizi', 'API\GiziApiController@create');
Route::get('/detail-gizi/{id}', 'API\GiziApiController@show');
Route::put('/edit-gizi/{id}', 'API\GiziApiController@update');

// ------    Imunisasi dan Vaksinasi    --------
Route::get('/getVaksinasi', 'API\VaksinasiApiController@getAll');
Route::get('/getImunisasi', 'API\ImunisasiApiController@getAll');
Route::get('/getImunisasi/{id}', 'API\ImunisasiApiController@getByPuskes');
Route::get('/getImunisasiByPosyandu/{id}', 'API\ImunisasiApiController@getByPosyandu');
Route::post('/add-imunisasi', 'API\ImunisasiApiController@create');
Route::get('/detail-imunisasi/{id}', 'API\ImunisasiApiController@show');
Route::put('/edit-imunisasi/{id}', 'API\ImunisasiApiController@update');

// ------    Lainnya    --------
Route::get('/getDesa', 'API\DesaApiController@getAll');
Route::get('/getIdDesa/{id}', 'API\DesaApiController@getById');
Route::get('/getKecamatan', 'API\KecamatanApiController@getAll');
Route::get('/getPosyandu', 'API\PosyanduApiController@getAll');
Route::get('getNamePosyandu/{id}', 'API\PosyanduAPIController@show');

/* ------    Test    --------
    Route::get('/try/{weight}/{gender}/{age}', 'API\GiziApiController@countWeightAge');
    Route::get('/coba', 'API\GiziApiController@test');
*/
