<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_kabupaten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KabupatenResource;
use Illuminate\Support\Facades\Validator;
use DB;

class \PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new KabupatenResource(vis_kabupaten::all());
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
            'kabupaten'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $kabupaten = vis_kabupaten::create([
            'id_provinsi'     => $request->id_provinsi,
            'kabupaten'     => $request->kabupaten
        ]);

        return new KabupatenResource($kabupaten);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(vis_kabupaten $kabupaten)
    {
        return new KabupatenResource($kabupaten);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsi(vis_kabupaten $kabupaten)
    {
        //dd("asik");
        $result =  DB::table('vis_kabupatens')
        ->join('vis_provinsis', 'vis_provinsis.id', '=', 'vis_kabupatens.id_provinsi')
        ->get();
        return response()->json(['data'=>$result]);
    }

     /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function showWithProvinsibyId(Request $request)
    {
        //dd($request->id);
        // $result =  DB::table('vis_kabupatens')
        // ->select('vis_kabupatens.*',
        // DB::raw('(select provinsi from vis_provinsis where id = vis_kabupatens.id_provinsi ) as provinsi')
        // )
        // ->where('vis_kabupatens.id', $request->id)        
        // ->get();

        $result =  DB::select('select * from vis_kabupatens as vk 
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
     * @param  vis_kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_kabupaten $kabupaten)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_provinsi'   => 'required',
            'kabupaten'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $kabupaten->update([
            'id_provinsi' => $request->id_provinsi,
            'kabupaten'     => $request->kabupaten
        ]);

        return new KabupatenResource($kabupaten);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_kabupaten $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_kabupaten $kabupaten)
    {
        $kabupaten->delete();
        
        return new KabupatenResource($kabupaten);
    }
}
