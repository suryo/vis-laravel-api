<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_jenis_surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisSuratResource;
use Illuminate\Support\Facades\Validator;
use DB;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new JenisSuratResource(vis_jenis_surat::all());
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
            'jenis_surat'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $jenis_surat = vis_jenis_surat::create([
            'id_desa'     => $request->id_desa,
            'jenis_surat'     => $request->jenis_surat
        ]);

        return new JenisSuratResource($jenis_surat);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_jenis_surat $jenis_surat
     * @return \Illuminate\Http\Response
     */
    public function show(vis_jenis_surat $jenis_surat)
    {
        return new JenisSuratResource($jenis_surat);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_jenis_surat $jenis_surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_jenis_surat $jenis_surat)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_desa' => 'required',
            'jenis_surat'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $jenis_surat->update([
            'id_desa'     => $request->id_desa,
            'jenis_surat'     => $request->jenis_surat
        ]);

        return new JenisSuratResource($jenis_surat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_jenis_surat $jenis_surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_jenis_surat $jenis_surat)
    {
        $jenis_surat->delete();
        
        return new JenisSuratResource($jenis_surat);
    }
}
