<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_berita_desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaDesaResource;
use Illuminate\Support\Facades\Validator;


class BeritaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BeritaDesaResource(vis_berita_desa::all());
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
            'judul' => 'required',
            'tanggal' => 'required',
            'berita'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $beritadesa = vis_berita_desa::create([
            'id_desa'     => $request->id_desa,
            'judul'     => $request->judul,
            'tanggal'     => $request->tanggal,
            'berita'     => $request->berita
        ]);

        return new BeritaDesaResource($beritadesa);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_berita_desa $beritadesa
     * @return \Illuminate\Http\Response
     */
    public function show(vis_berita_desa $beritadesa)
    {
        return new BeritaDesaResource($beritadesa);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_berita_desa $beritadesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vis_berita_desa $beritadesa)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_desa' => 'required',
            'judul' => 'required',
            'tanggal' => 'required',
            'berita'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $beritadesa->update([
            'id_desa'     => $request->id_desa,
            'judul'     => $request->judul,
            'tanggal'     => $request->tanggal,
            'berita'     => $request->berita
        ]);

        return new BeritaDesaResource($beritadesa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_berita_desa $beritadesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_berita_desa $beritadesa)
    {
        $beritadesa->delete();
        
        return new BeritaDesaResource($beritadesa);
    }
}
