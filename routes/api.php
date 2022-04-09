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

// Mengambil Satu kabupaten dengan provinsi
//Route::get('/kabupaten/all', 'App\Http\Controllers\Api\KabupatenController@showWithProvinsi');
// Mengambil Satu kabupaten dengan provinsi
//Route::get('/kabupaten/all/{id}', 'App\Http\Controllers\Api\KabupatenController@showWithProvinsibyId');

/**
 * route resource desa
*/
Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);
Route::get('/userlogin', 'App\Http\Controllers\Api\UserController@getuserlogin');
Route::put('/user', 'App\Http\Controllers\Api\UserController@update');
/**
 * route resource provinsi
*/
Route::apiResource('/provinsi', App\Http\Controllers\Api\ProvinsiController::class);
/**
 * route resource kabupaten
*/
Route::apiResource('/kabupaten', App\Http\Controllers\Api\KabupatenController::class);
/**
 * route resource kota
*/
Route::apiResource('/kota', App\Http\Controllers\Api\KotaController::class);
/**
 * route resource kecamatan
*/
Route::apiResource('/kecamatan', App\Http\Controllers\Api\KecamatanController::class);
/**
 * route resource desa
*/
Route::apiResource('/desa', App\Http\Controllers\Api\DesaController::class);
