<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use DB;
/**

    @OA\Info(
    title="API VILLAGE INFORMATION SYSTEM ",
    version="1.0.0",
    )
    */

class UserController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
    * @OA\Get(
    *      path="/user",
    *      operationId="getUserList",
    *      tags={"Users"},
    *      summary="Get list of users",
    *      description="Returns list of users",
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          )
    *       ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      )
    *     )
    */
    public function index(Request $request)
    {
       
        return new UserResource(vis_user::all());
    }

    public function getuserlogin(Request $request)
    {   
        $username = ($request->username);
        $password = md5(($request->pwd));
        

        $result =  DB::select(
            'select * from vis_users as u
        where u.username ="' . $username. '" AND u.password ="'. $password.'"'
        );
        $login = response()->json(['data' => $result]);
        // dump($username);
        // dump($password);
        //dump($login);
        // dump($result[0]->id);
        // die;
        if (!empty($result))
        {
            $result = [
                'name' => 'getuser',
                'status' =>  'ok',
                'id' => $result[0]->id,
                'meesage' => 'udah ok gaes'
            ];
        }
        else
        {
            $result = [
                'name' => 'getuser',
                'status' =>  'null',
               
            ];
        }

        return new UserResource($result);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Post(
     *      path="/user",
     *      operationId="storeUser",
     *      tags={"Users"},
     *      summary="Store new user",
     *      description="Returns user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=201,
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
     *      )
     * )
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $user = vis_user::create([
            'username'     => $request->username,
            'password'     => md5($request->password)
        ]);
        // dump($request->password);
        // dump( md5($request->password));
        // die;
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_user $user
     * @return \Illuminate\Http\Response
     */
    public function show(vis_user $user)
    {
        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_user $user
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Put(
     *      path="/user/{id}",
     *      operationId="updateUser",
     *      tags={"Users"},
     *      summary="Update existing user",
     *      description="Returns updated user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent()
     *      ),
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
    public function update(Request $request, vis_user $user)
    {
        //  dd($request->username);
        //set validation
        // $validator = Validator::make($request->all(), [
        //     'username' => 'required',
        //     'password'   => 'required'
        // ]);

        // //response error validation
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

        //update to database
        $user->update([
            'username'     => $request->username,
            'password'     => md5($request->password)
        ]);

        return new UserResource($user);
    }
    public function getRequest(Request $request)
    {
        $req = $request->username;
        return $req;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_user $user
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Delete(
     *      path="/user/{id}",
     *      operationId="deleteUser",
     *      tags={"Users"},
     *      summary="Delete existing user",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Users id",
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
    public function destroy(vis_user $user)
    {
        $user->delete();

        return new UserResource($user);
    }
}
