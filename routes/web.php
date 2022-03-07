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

// API route group prefix /api
$router->group(['prefix' => 'api'], function () use ($router) {
    // /*
    // * Matches
    // * /api/provinsi (post, get method)
    // * /api/provinsi/id (get, put, delete method)
    // */
    // $router->post('provinsi', 'ProvinsiController@store');
    // $router->get('provinsi', 'ProvinsiController@index');
    // $router->get('provinsi/{id}', 'ProvinsiController@show');
    // $router->put('provinsi/{id}', 'ProvinsiController@update');
    // $router->delete('provinsi/{id}', 'ProvinsiController@destroy');

    // /*
    // * Matches
    // * /api/kota (post, get method)
    // * /api/kota/id (get, put, delete method)
    // */
    // $router->post('kota', 'KotaController@store');
    // $router->get('kota', 'KotaController@index');
    // $router->get('kota/{id}', 'KotaController@show');
    // $router->put('kota/{id}', 'KotaController@update');
    // $router->delete('kota/{id}', 'KotaController@destroy');

    // /*
    // * Matches
    // * /api/kecamatan (post, get method)
    // * /api/kecamatan/id (get, put, delete method)
    // */
    // $router->post('kecamatan', 'KecamatanController@store');
    // $router->get('kecamatan', 'KecamatanController@index');
    // $router->get('kecamatan/{id}', 'KecamatanController@show');
    // $router->put('kecamatan/{id}', 'KecamatanController@update');
    // $router->delete('kecamatan/{id}', 'KecamatanController@destroy');

    // /*
    // * Matches
    // * /api/kabupaten (post, get method)
    // * /api/kabupaten/id (get, put, delete method)
    // */
    // $router->post('kabupaten', 'KabupatenController@store');
    // $router->get('kabupaten', 'KabupatenController@index');
    // $router->get('kabupaten/{id}', 'KabupatenController@show');
    // $router->put('kabupaten/{id}', 'KabupatenController@update');
    // $router->delete('kabupaten/{id}', 'KabupatenController@destroy');


    // /*
    // * Matches
    // * /api/desa (post, get method)
    // * /api/desa/id (get, put, delete method)
    // */
    // $router->post('desa', 'DesaController@store');
    // $router->get('desa', 'DesaController@index');
    // $router->get('desa/{id}', 'DesaController@show');
    // $router->put('desa/{id}', 'DesaController@update');
    // $router->delete('desa/{id}', 'DesaController@destroy');

});