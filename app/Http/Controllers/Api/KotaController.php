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
    protected $vis_kota;
    public function __construct(vis_kota $vis_kota)
    {
        $this->vis_kota = $vis_kota;
    }

     /**
    * @OA\Get(
    *      path="/api/kotan",
    *      operationId="getKotaList",
    *      tags={"Kota"},
    *      summary="Get list of kotas",
    *      description="Returns list of kotas",
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          )
    *       )
    *     )
    */
    public function index()
    {



        $arrayresult = [];
        $result = [
            'name' => 'EVENT_APPROVAL',
            'data' => vis_kota::all(),
            'status' => 'Add success', 'code' => 200
        ];

        return new KotaResource($result);
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
        return $this->showWithProvinsi($kota);
        //return new KotaResource($kota);
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
        return response()->json(['data' => $result]);
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
        where vk.id =' . $request->id);
        return response()->json(['data' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_kota $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id, vis_kota $kota)
    {

        $data = $this->validate($request, [
            'kota' => 'required|max:100',
        ]);

        try {
            $vis_kota = $this->vis_kota->findOrFail($id);
            $vis_kota->fill($data);
            $vis_kota->save();

            //return successful response
            return response()->json([
                'status' => true,
                'message' => 'Data Kota berhasil diupdate',
                'data' => $vis_kota
            ], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json([
                'status' => false,
                'message' => 'Update data kota gagal'
            ], 409);
        }


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
    public function destroy(vis_kota $kota, int $id)
    {
        try {
            $Vis_kota = $this->vis_kota->findOrFail($id);
            $Vis_kota->delete();

            //return successful response
            return response()->json([
                'status' => true,
                'message' => 'Data Provinsi berhasil dihapus',
                'user' => $Vis_kota
            ], 201);
        } catch (\Exception $e) {

            //return error message
            return response()->json([
                'status' => false,
                'message' => 'Hapus data provinsi gagal'
            ], 409);
        }
        // dd($kota);
        // $kota->delete();

        // return new KotaResource($kota);
    }
}
