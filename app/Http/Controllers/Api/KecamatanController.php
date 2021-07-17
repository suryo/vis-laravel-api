<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KecamatanResource;
use Illuminate\Support\Facades\Validator;
use DB;

class KecamatanController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new KecamatanResource(vis_kecamatan::all());
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
            'id_kota' => 'required',
            'id_kabupaten' => 'required',
            'id_provinsi' => 'required',
            'kecamatan'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $kecamatan = vis_kecamatan::create([
            'id_kota'     => $request->id_kota,
            'id_kabupaten'     => $request->id_kabupaten,
            'id_provinsi'     => $request->id_provinsi,
            'kecamatan'     => $request->kecamatan
        ]);

        return new KecamatanResource($kecamatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(vis_kecamatan $kecamatan)
    {
        return new KecamatanResource($kecamatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsi(vis_kecamatan $kecamatan)
    {
        //dd("asik");
        $result =  DB::table('vis_kecamatans')
        ->join('vis_provinsis', 'vis_provinsis.id', '=', 'vis_kecamatans.id_provinsi')
        ->get();
        return response()->json(['data'=>$result]);
    }

     /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsibyId(Request $request)
    {
        //dd($request->id);
        // $result =  DB::table('vis_kecamatans')
        // ->select('vis_kecamatans.*',
        // DB::raw('(select provinsi from vis_provinsis where id = vis_kecamatans.id_provinsi ) as provinsi')
        // )
        // ->where('vis_kecamatans.id', $request->id)        
        // ->get();

        $result =  DB::select('select * from vis_kecamatans as vk 
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
     * @param  vis_kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_kecamatan $kecamatan)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_kota' => 'required',
            'id_kabupaten' => 'required',
            'id_provinsi' => 'required',
            'kecamatan'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $kecamatan->update([
            'id_kota'     => $request->id_kota,
            'id_kabupaten'     => $request->id_kabupaten,
            'id_provinsi'     => $request->id_provinsi,
            'kecamatan'     => $request->kecamatan
        ]);

        return new KecamatanResource($kecamatan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_kecamatan $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_kecamatan $kecamatan)
    {
        $kecamatan->delete();
        
        return new KecamatanResource($kecamatan);
    }
}
