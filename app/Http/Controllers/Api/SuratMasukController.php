<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_surat_masuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SuratMasukResource;
use Illuminate\Support\Facades\Validator;
use DB;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SuratMasukResource(vis_surat_masuk::all());
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
            'tgl_masuk' => 'required',
            'perihal'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $perihal = vis_surat_masuk::create([
            'id_jenis_surat'     => $request->id_jenis_surat,
            'tgl_masuk'     => $request->tgl_masuk,
            'perihal'     => $request->perihal
        ]);

        return new SuratMasukResource($perihal);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_surat_masuk $perihal
     * @return \Illuminate\Http\Response
     */
    public function show(vis_surat_masuk $perihal)
    {
        return new SuratMasukResource($perihal);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_surat_masuk $perihal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_surat_masuk $perihal)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_jenis_surat' => 'required',
            'tgl_masuk' => 'required',
            'perihal'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $perihal->update([
            'id_jenis_surat'     => $request->id_jenis_surat,
            'tgl_masuk'     => $request->tgl_masuk,
            'perihal'     => $request->perihal
        ]);

        return new SuratMasukResource($perihal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_surat_masuk $perihal
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_surat_masuk $perihal)
    {
        $perihal->delete();
        
        return new SuratMasukResource($perihal);
    }
}
