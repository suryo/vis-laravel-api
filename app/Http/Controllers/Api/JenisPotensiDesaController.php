<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_jenis_potensi_desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisPotensiDesaResource;
use Illuminate\Support\Facades\Validator;
use DB;

class JenisPotensiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new JenisPotensiDesaResource(vis_jenis_potensi_desa::all());
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
            'nama_potensi'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $nama_potensi = vis_jenis_potensi_desa::create([
            'id_desa'     => $request->id_desa,
            'nama_potensi'     => $request->nama_potensi
        ]);

        return new JenisPotensiDesaResource($nama_potensi);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_jenis_potensi_desa $nama_potensi
     * @return \Illuminate\Http\Response
     */
    public function show(vis_jenis_potensi_desa $nama_potensi)
    {
        return new JenisPotensiDesaResource($nama_potensi);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_jenis_potensi_desa $nama_potensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_jenis_potensi_desa $nama_potensi)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_desa' => 'required',
            'nama_potensi'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $nama_potensi->update([
            'id_desa'     => $request->id_desa,
            'nama_potensi'     => $request->nama_potensi
        ]);

        return new JenisPotensiDesaResource($nama_potensi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_jenis_potensi_desa $nama_potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_jenis_potensi_desa $nama_potensi)
    {
        $nama_potensi->delete();
        
        return new JenisPotensiDesaResource($nama_potensi);
    }
}
