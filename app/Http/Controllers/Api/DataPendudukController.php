<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_data_penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataPendudukResource;
use Illuminate\Support\Facades\Validator;

class DataPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DataPendudukResource(vis_data_penduduk::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'no_kk' => 'required',
            'id_desa'   => 'required',
            'nama_penduduk'   => 'required',
            'jenis_kelamin'   => 'required',
            'alamat_penduduk'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $datapenduduk = vis_data_penduduk::create([
            'no_kk'     => $request->no_kk,
            'id_desa'     => $request->id_desa,
            'nama_penduduk'     => $request->nama_penduduk,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'alamat_penduduk'     => $request->alamat_penduduk
        ]);

        return new DataPendudukResource($datapenduduk);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_data_penduduk $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(vis_data_penduduk $datapenduduk)
    {
        return new DataPendudukResource($datapenduduk);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_data_penduduk $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_data_penduduk $datapenduduk)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'no_kk' => 'required',
            'id_desa'   => 'required',
            'nama_penduduk'   => 'required',
            'jenis_kelamin'   => 'required',
            'alamat_penduduk'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $datapenduduk->update([
            'no_kk'     => $request->no_kk,
            'id_desa'     => $request->id_desa,
            'nama_penduduk'     => $request->nama_penduduk,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'alamat_penduduk'     => $request->alamat_penduduk
        ]);

        return new DataPendudukResource($datapenduduk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_data_penduduk $datapenduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_data_penduduk $datapenduduk)
    {
        $datapenduduk->delete();
        
        return new DataPendudukResource($datapenduduk);
    }
}
