<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_kota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KotaResource;
use Illuminate\Support\Facades\Validator;
use DB;

class KotaController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new KotaResource(vis_kota::all());
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
            'id_provinsi' => 'required',
            'kota'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $kota = vis_kota::create([
            'id_provinsi'     => $request->id_provinsi,
            'kota'     => $request->kota
        ]);

        return new KotaResource($kota);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kota $kota
     * @return \Illuminate\Http\Response
     */
    public function show(vis_kota $kota)
    {
        return new KotaResource($kota);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kota $kota
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsi(vis_kota $kota)
    {
        //dd("asik");
        $result =  DB::table('vis_kotas')
        ->join('vis_provinsis', 'vis_provinsis.id', '=', 'vis_kotas.id_provinsi')
        ->get();
        return response()->json(['data'=>$result]);
    }

     /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_kota $kota
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsibyId(Request $request)
    {
        //dd($request->id);
        // $result =  DB::table('vis_kotas')
        // ->select('vis_kotas.*',
        // DB::raw('(select provinsi from vis_provinsis where id = vis_kotas.id_provinsi ) as provinsi')
        // )
        // ->where('vis_kotas.id', $request->id)        
        // ->get();

        $result =  DB::select('select * from vis_kotas as vk 
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
     * @param  vis_kota $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_kota $kota)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_provinsi'   => 'required',
            'kota'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $kota->update([
            'id_provinsi' => $request->id_provinsi,
            'kota'     => $request->kota
        ]);

        return new KotaResource($kota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_kota $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_kota $kota)
    {
        $kota->delete();
        
        return new KotaResource($kota);
    }
}
