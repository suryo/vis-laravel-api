<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserResource(vis_user::all());
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
            'nik' => 'required',
            'password'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $user = vis_user::create([
            'nik'     => $request->nik,
            'password'     => $request->password
        ]);

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
    public function update(Request $request, vis_user $user)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $user->update([
            'nik'     => $request->nik,
            'password'     => $request->password
        ]);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(vis_user $user)
    {
        $user->delete();
        
        return new UserResource($user);
    }
}
