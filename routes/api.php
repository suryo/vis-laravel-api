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
Route::get('/kabupaten/all', 'App\Http\Controllers\Api\KabupatenController@showWithProvinsi');
// Mengambil Satu kabupaten dengan provinsi
Route::get('/kabupaten/all/{id}', 'App\Http\Controllers\Api\KabupatenController@showWithProvinsibyId');

Route::apiResource('/provinsi', App\Http\Controllers\Api\ProvinsiController::class);

Route::apiResource('/kabupaten', App\Http\Controllers\Api\KabupatenController::class);

Route::apiResource('/datapenduduk', App\Http\Controllers\Api\DataPendudukController::class);

Route::apiResource('/jenislembagadesa', App\Http\Controllers\Api\JenisLembagaDesaController::class);