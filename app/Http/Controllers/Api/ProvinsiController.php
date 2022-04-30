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

    /**
     * @OA\Get(
     *      path="/api/provinsi",
     *      operationId="getProvinsiList",
     *      tags={"Provinsi"},
     *      summary="Get list of provinsis",
     *      description="Returns list of provinsis",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          )
     *       )
     *     )
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
    /**
     * @OA\POST(
     *     path="/api/provinsi",
     *     summary="Create a Test",
     *     tags={"Provinsi"},
     *     @OA\RequestBody(
     *        required = true,
     *        description = "Data packet for Test",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="data",
     *                type="array",
     *                @OA\Items(
     *                      @OA\Property(
     *                         property="provinsi",
     *                         type="string",
     *                         example=""
     *                      ),
     *                     
     *                ),
     *             ),
     *        ),
     *     ),
     *
     *
     *     @OA\Response(
     *        response="200",
     *        description="Successful response",
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $result = [];
        $data = ($request->json("data"));
        //dd($data[0]["provinsi"]);
        //set validation
        if (count($data) == 0) {
            $validator = Validator::make($request->all(), [
                'provinsi'   => 'required'
            ]);


            //response error validation
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
        } else {
            for ($d = 0; $d < count($data); $d++) {
                //save to database
                $provinsi = vis_provinsi::create([
                    'provinsi'     => $data[$d]["provinsi"]
                ]);
                $p = [
                    'name' => 'Insert Provinsi',
                    'provinsi' => $data[$d]["provinsi"],
                    'status' => 'success', 'code' => 200
                ];
                array_push($result,$p);
            }
        }


        return new ProvinsiResource($result);
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

     /**
     * @OA\Put(
     *      path="/api/provinsi/{id}",
     *      operationId="updateProvinsi",
     *      tags={"Provinsi"},
     *      summary="Update existing provinsi",
     *      description="Returns updated provinsi data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Provinsi id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *        required = true,
     *        description = "Data packet for Test",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="data",
     *                type="array",
     *                @OA\Items(
     *                      @OA\Property(
     *                         property="provinsi",
     *                         type="string",
     *                         example=""
     *                      ),
     *                     
     *                ),
     *             ),
     *        ),
     *     ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(Request $request, vis_provinsi $provinsi)
    {
        $result = [];
        $data = ($request->json("data"));

        if (count($data) == 0) {
        //set validation
        $validator = Validator::make($request->all(), [
            'provinsi'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        }

        //update to database
        $provinsi->update([
            'provinsi'     => $data[0]["provinsi"]
        ]);

        $p = [
            'name' => 'Update Provinsi',
            'provinsi' => $data[0]["provinsi"],
            'status' => 'success', 'code' => 200
        ];
        array_push($result,$p);

        return new ProvinsiResource($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_provinsi $provinsi
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Delete(
     *      path="/api/provinsi/{id}",
     *      operationId="deleteProvinsi",
     *      tags={"Provinsi"},
     *      summary="Delete existing Provinsi",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Provinsi id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(vis_provinsi $provinsi)
    {
        $provinsi->delete();

        return new ProvinsiResource($provinsi);
    }
}
