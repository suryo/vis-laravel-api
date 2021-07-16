<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_jenis_lembaga_desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisLembagaDesaResource;
use Illuminate\Support\Facades\Validator;
use DB;

class JenisLembagaDesaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new JenisLembagaDesaResource(vis_jenis_lembaga_desa::all());
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
            'nama_lembaga'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $jenislembagadesa = vis_jenis_lembaga_desa::create([
            'nama_lembaga' => $request->nama_lembaga
        ]);

        return new JenisLembagaDesaResource($jenislembagadesa);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_jenis_lembaga_desa $jenislembagadesa
     * @return \Illuminate\Http\Response
     */
    public function show(vis_jenis_lembaga_desa $jenislembagadesa)
    {
        return new JenisLembagaDesaResource($jenislembagadesa);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_jenis_lembaga_desa $jenislembagadesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_jenis_lembaga_desa $jenislembagadesa)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama_lembaga'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $jenislembagadesa->update([
            'nama_lembaga' => $request->nama_lembaga
        ]);

        return new JenisLembagaDesaResource($jenislembagadesa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_jenis_lembaga_desa $jenislembagadesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_jenis_lembaga_desa $jenislembagadesa)
    {
        $jenislembagadesa->delete();
        
        return new JenisLembagaDesaResource($jenislembagadesa);
    }
}
