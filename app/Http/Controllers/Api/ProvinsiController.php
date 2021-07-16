<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinsiResource;
use Illuminate\Support\Facades\Validator;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProvinsiResource(vis_provinsi::all());
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
            'provinsi'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $provinsi = vis_provinsi::create([
            'provinsi'     => $request->provinsi
        ]);

        return new ProvinsiResource($provinsi);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_provinsi $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(vis_provinsi $provinsi)
    {
        return new ProvinsiResource($provinsi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_provinsi $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_provinsi $provinsi)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'provinsi'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $provinsi->update([
            'provinsi'     => $request->provinsi
        ]);

        return new ProvinsiResource($provinsi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_provinsi $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_provinsi $provinsi)
    {
        $provinsi->delete();
        
        return new ProvinsiResource($provinsi);
    }
}
