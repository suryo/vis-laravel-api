<?php

namespace App\Http\Controllers\Api;

use App\Models\vis_file;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use Illuminate\Support\Facades\Validator;
use DB;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        return new FileResource(vis_file::all());
    }

    public function getuserlogin(Request $request)
    {
        $username = ($request->username);
        $password = md5(($request->pwd));


        $result =  DB::select(
            'select * from vis_files as u
        where u.username ="' . $username . '" AND u.password ="' . $password . '"'
        );
        $login = response()->json(['data' => $result]);

        if (!empty($result)) {
            $result = [
                'name' => 'getuser',
                'status' =>  'ok',
                'id' => $result[0]->id,
                'meesage' => 'udah ok gaes'
            ];
        } else {
            $result = [
                'name' => 'getuser',
                'status' =>  'null',

            ];
        }

        return new FileResource($result);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:doc,docx,pdf,txt,csv|max:2048',
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($file = $request->file('file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();

            //store your file into directory and db
            $save = new vis_file();
            $save->name = $name;
            $save->path = $path;
            $save->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  vis_file $user
     * @return \Illuminate\Http\Response
     */
    public function show(vis_file $user)
    {
        return new FileResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  vis_file $user
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, vis_file $user)
    {


        //update to database
        $user->update([
            'username'     => $request->username,
            'password'     => md5($request->password)
        ]);

        return new FileResource($user);
    }
    public function getRequest(Request $request)
    {
        $req = $request->username;
        return $req;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  vis_file $user
     * @return \Illuminate\Http\Response
     */


    public function destroy(vis_file $user)
    {
        $user->delete();

        return new FileResource($user);
    }

    public function upload(Request $request)
    {

    }
}
