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
    public function index(Request $request)
    {
        echo "ayam";
      
        // dump("ayam");
        // dump("asik");
        // dump("goreng");
        // dump("tes");
        // die;
        
        // return new UserResource(vis_user::all());
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
    public function destroy(vis_user $user)
    {
        $user->delete();

        return new UserResource($user);
    }
}
