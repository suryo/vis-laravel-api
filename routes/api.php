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
//Route::apiResource('/desa', App\Http\Controllers\Api\DesaController::class);
/**
 * route resource berita desa
*/
//Route::apiResource('/beritadesa', App\Http\Controllers\Api\BeritaDesaController::class);
/**
 * route resource kartu keluarga
*/
//Route::apiResource('/kartukeluarga', App\Http\Controllers\Api\KartuKeluargaController::class);
/**
 * route resource kecamatan
*/
//Route::apiResource('/', App\Http\Controllers\Api\KecamatanController::class);
/**
 * route resource jenis lembaga desa
*/
//Route::apiResource('/jenislembagadesa', App\Http\Controllers\Api\JenisLembagaDesaController::class);
/**
 * route resource lembaga desa
*/
//Route::apiResource('/lembagadesa', App\Http\Controllers\Api\LembagaDesaController::class);
/**
 * route resource jenis potensi desa
*/
//Route::apiResource('/jenispotensidesa', App\Http\Controllers\Api\JenisPotensiDesaController::class);
/**
 * route resource jenis surat
*/
//Route::apiResource('/jenissurat', App\Http\Controllers\Api\JenisSuratController::class);
/**
 * route resource master surat
*/
//Route::apiResource('/mastersurat', App\Http\Controllers\Api\MasterSuratController::class);
/**
 * route resource surat keluar
*/
//Route::apiResource('/suratkeluar', App\Http\Controllers\Api\SuratKeluarController::class);
/**
 * route resource surat masuk
*/
//Route::apiResource('/suratmasuk', App\Http\Controllers\Api\SuratMasukController::class);
/**
 * route resource data penduduk
*/
//Route::apiResource('/datapenduduk', App\Http\Controllers\Api\DataPendudukController::class);
/**
 * route resource perangkat desa
*/
//Route::apiResource('/perangkatdesa', App\Http\Controllers\Api\PerangkatDesaController::class);
/**
 * route resource user
*/
//Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);


//Route::apiResource('/datapenduduk', App\Http\Controllers\Api\DataPendudukController::class);

//Route::apiResource('/jenislembagadesa', App\Http\Controllers\Api\JenisLembagaDesaController::class);