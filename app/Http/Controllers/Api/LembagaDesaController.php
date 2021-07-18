<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_lembaga_desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LembagaDesaResource;
use Illuminate\Support\Facades\Validator;
use DB;

class LembagaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LembagaDesaResource(vis_lembaga_desa::all());
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
            'id_jenis_lembaga' => 'required',
            'id_desa' => 'required',
            'lembaga_desa'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $lembaga_desa = vis_lembaga_desa::create([
            'id_jenis_lembaga'     => $request->id_jenis_lembaga,
            'id_desa'     => $request->id_desa,
            'lembaga_desa'     => $request->lembaga_desa
        ]);

        return new LembagaDesaResource($lembaga_desa);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_lembaga_desa $lembaga_desa
     * @return \Illuminate\Http\Response
     */
    public function show(vis_lembaga_desa $lembaga_desa)
    {
        return new LembagaDesaResource($lembaga_desa);
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_lembaga_desa $lembaga_desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_lembaga_desa $lembaga_desa)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_jenis_lembaga' => 'required',
            'id_desa' => 'required',
            'lembaga_desa'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $lembaga_desa->update([
            'id_jenis_lembaga'     => $request->id_jenis_lembaga,
            'id_desa'     => $request->id_desa,
            'lembaga_desa'     => $request->lembaga_desa
        ]);

        return new LembagaDesaResource($lembaga_desa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_lembaga_desa $lembaga_desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_lembaga_desa $lembaga_desa)
    {
        $lembaga_desa->delete();
        
        return new LembagaDesaResource($lembaga_desa);
    }
}
