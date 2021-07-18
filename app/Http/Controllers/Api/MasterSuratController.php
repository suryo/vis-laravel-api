<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_master_surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MasterSuratResource;
use Illuminate\Support\Facades\Validator;
use DB;

class MasterSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MasterSuratResource(vis_master_surat::all());
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
            'id_jenis_surat' => 'required',
            'file' => 'required',
            'link' => 'required',
            'version_date'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $kabupaten = vis_master_surat::create([
            'id_jenis_surat'     => $request->id_jenis_surat,
            'file'     => $request->file,
            'link'     => $request->link,
            'version_date'     => $request->version_date
        ]);

        return new MasterSuratResource($kabupaten);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_master_surat $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(vis_master_surat $kabupaten)
    {
        return new MasterSuratResource($kabupaten);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_master_surat $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_master_surat $kabupaten)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_jenis_surat' => 'required',
            'file' => 'required',
            'link' => 'required',
            'version_date'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $kabupaten->update([
            'id_jenis_surat'     => $request->id_jenis_surat,
            'file'     => $request->file,
            'link'     => $request->link,
            'version_date'     => $request->version_date
        ]);

        return new MasterSuratResource($kabupaten);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_master_surat $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_master_surat $kabupaten)
    {
        $kabupaten->delete();
        
        return new MasterSuratResource($kabupaten);
    }
}
