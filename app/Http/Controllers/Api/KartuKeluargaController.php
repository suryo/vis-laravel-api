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
            'nik' => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $nik = vis_kartu_keluarga::create([
            'nik'     => $request->nik
        ]);

        return new KartuKeluargaResource($nik);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kartu_keluarga $nik
     * @return \Illuminate\Http\Response
     */
    public function show(vis_kartu_keluarga $nik)
    {
        return new KartuKeluargaResource($nik);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kartu_keluarga $nik
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsi(vis_kartu_keluarga $nik)
    {
        //dd("asik");
        $result =  DB::table('vis_kartu_keluargas')
        ->join('vis_provinsis', 'vis_provinsis.id', '=', 'vis_kartu_keluargas.id_provinsi')
        ->get();
        return response()->json(['data'=>$result]);
    }

     /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_kartu_keluarga $nik
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsibyId(Request $request)
    {
        //dd($request->id);
        // $result =  DB::table('vis_kartu_keluargas')
        // ->select('vis_kartu_keluargas.*',
        // DB::raw('(select provinsi from vis_provinsis where id = vis_kartu_keluargas.id_provinsi ) as provinsi')
        // )
        // ->where('vis_kartu_keluargas.id', $request->id)        
        // ->get();

        $result =  DB::select('select * from vis_kartu_keluargas as vk 
        JOIN vis_provinsis as vp 
        ON 
        vk.id_provinsi=vp.id 
        where vk.id ='. $request->id);
        return response()->json(['data'=>$result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_kartu_keluarga $nik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_kartu_keluarga $nik)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nik'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $nik->update([
            'nik' => $request->nik
        ]);

        return new KartuKeluargaResource($nik);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_kartu_keluarga $nik
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_kartu_keluarga $nik)
    {
        $nik->delete();
        
        return new KartuKeluargaResource($nik);
    }
}
