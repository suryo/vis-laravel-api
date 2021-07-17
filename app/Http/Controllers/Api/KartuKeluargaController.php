<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_kartu_keluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KartuKeluargaResource;
use Illuminate\Support\Facades\Validator;
use DB;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new KartuKeluargaResource(vis_kartu_keluarga::all());
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
            'nik' => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $no_kk = vis_kartu_keluarga::create([
            'no_kk' => $request->no_kk,
            'nik'     => $request->nik
        ]);

        return new KartuKeluargaResource($no_kk);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kartu_keluarga $no_kk
     * @return \Illuminate\Http\Response
     */
    public function show(vis_kartu_keluarga $no_kk)
    {
        return new KartuKeluargaResource($no_kk);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_kartu_keluarga $no_kk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_kartu_keluarga $no_kk)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'no_kk'   => 'required',
            'nik'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $no_kk->update([
            'no_kk' => $request->no_kk,
            'nik' => $request->nik
        ]);

        return new KartuKeluargaResource($no_kk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_kartu_keluarga $no_kk
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_kartu_keluarga $no_kk)
    {
        $no_kk->delete();
        
        return new KartuKeluargaResource($no_kk);
    }
}
