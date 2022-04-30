<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_kabupaten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KabupatenResource;
use Illuminate\Support\Facades\Validator;
use DB;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *      path="/api/kabupaten",
    *      operationId="getKabupatenList",
    *      tags={"Kabupaten"},
    *      summary="Get list of kabupatens",
    *      description="Returns list of kabupatens",
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          )
    *       )
    *     )
    */
    public function index()
    {
        // return new KabupatenResource(vis_kabupaten::all());

        // $arrayresult = [];
        $result = [
            'name' => 'Kabupaten',
            'data' =>  $this->showWithProvinsi(),
            'status' => 'success', 'code' => 200
        ];

        return new KabupatenResource($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Post(
     *      path="/api/kabupaten",
     *      operationId="storeKabupaten",
     *      tags={"Kabupaten"},
     *      summary="Store new user",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="body",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *      ),
     *       @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="object",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="ids",
     *                     type="array",
     *                     @OA\Items(type="integer")
     *                 )
     *             )
     *         )
     *       ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     */
    public function store(Request $request)
    {
        //set validation
        $data = json_decode($request->getContent(), true);

        $datainput = [];
        //how to get data from input;
        $datainput["id_provinsi"] = $request->get('id_provinsi');
        $datainput["kabupaten"] = $request->get('kabupaten');

        //validator, if data empty
        $validator = Validator::make($request->all(), [
            'id_provinsi' => 'required',
            'kabupaten'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $simpan= $this->savedata($datainput);
        $panjang_array = count($datainput["kabupaten"]);
        //dd($panjang_array);
        //save to database
        // $kabupaten = vis_kabupaten::create([
        //     'id_provinsi'     => $request->id_provinsi,
        //     'kabupaten'     => $request->kabupaten
        // ]);
        //die;


        $result = [
            'name' => 'Kabupaten',
            'data' =>  $simpan,
            'status' => 'success', 'code' => 200
        ];


        return new KabupatenResource($result);
    }

    public function savedata($datainput)
    {
        $allresult = array();
        $panjang_array = count($datainput["kabupaten"]);
        for ($x = 0; $x < $panjang_array; $x++) {
            $kabupaten = vis_kabupaten::create([
                'id_provinsi'     => $datainput["id_provinsi"][$x],
                'kabupaten'     => $datainput["kabupaten"][$x]
            ]);
            $result = [
                'id_provinsi'     => $datainput["id_provinsi"][$x],
                'kabupaten'     => $datainput["kabupaten"][$x],
                'status' => 'add success', 'code' => 200
            ];
            array_push($allresult, $result);
            
        }
        return $allresult;

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
    public function showWithProvinsi()
    {
        //dd("asik");
        $result =  DB::table('vis_kabupatens')
            ->join('vis_provinsis', 'vis_provinsis.id', '=', 'vis_kabupatens.id_provinsi')
            ->get();
        return $result;
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
        where vk.id =' . $request->id);
        return response()->json(['data' => $result]);
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
