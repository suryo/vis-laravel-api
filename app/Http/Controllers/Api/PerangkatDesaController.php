<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_perangkat_desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerangkatDesaResource;
use Illuminate\Support\Facades\Validator;
use DB;

class PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PerangkatDesaResource(vis_perangkat_desa::all());
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
            'id_desa' => 'required',
            'nik' => 'required',
            'nama_perangkat_desa' => 'required',
            'jabatan'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $perangkatdesa = vis_perangkat_desa::create([
            'id_desa'     => $request->id_desa,
            'nik'     => $request->nik,
            'nama_perangkat_desa'     => $request->nama_perangkat_desa,
            'jabatan'     => $request->jabatan
        ]);

        return new PerangkatDesaResource($perangkatdesa);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_perangkat_desa $perangkatdesa
     * @return \Illuminate\Http\Response
     */
    public function show(vis_perangkat_desa $perangkatdesa)
    {
        return new PerangkatDesaResource($perangkatdesa);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_perangkat_desa $perangkatdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_perangkat_desa $perangkatdesa)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_desa' => 'required',
            'nik' => 'required',
            'nama_perangkat_desa' => 'required',
            'jabatan'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $perangkatdesa->update([
            'id_desa'     => $request->id_desa,
            'nik'     => $request->nik,
            'nama_perangkat_desa'     => $request->nama_perangkat_desa,
            'jabatan'     => $request->jabatan
        ]);

        return new PerangkatDesaResource($perangkatdesa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_perangkat_desa $perangkatdesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_perangkat_desa $perangkatdesa)
    {
        $perangkatdesa->delete();
        
        return new PerangkatDesaResource($perangkatdesa);
    }
}
