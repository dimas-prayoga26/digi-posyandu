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

Route::post("/Login", "API\KaderApiController@login");
Route::post('/anak', 'API\AnakApiController@create');
Route::get('/getAnak', 'API\AnakApiController@getAll');
Route::post('/data-gizi', 'API\GiziApiController@create');
//Route::get('/try/{weight}/{gender}/{age}', 'API\GiziApiController@countWeightAge');
//Route::get('/coba', 'API\GiziApiController@test');
Route::get('/getDesa', 'API\DesaApiController@getAll');
Route::get('/getKecamatan', 'API\KecamatanApiController@getAll');
Route::get('/getPosyandu', 'API\PosyanduApiController@getAll');
