<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaderApiController extends Controller
{
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $auth = auth()->guard('users');
        $credentials = [
            'username'  => $username,
            'password'  => $password
        ];

        if($auth->attempt($credentials)) {
            $user = User::where('username', $username)->first();
            return response()->json([
                'value'     => 1,
		'message'   => 'Login berhasil'
            ]);
        }
        else {
            return response()->json(['status' => 'fail']);
        }
    }

    public function show($id){
        $data = User::where('id_user', $id)->get();
        return respons()->json($data);
    }

    public function update(Request $request, $id){
        $user = [
            'name'          => $request->name,
            'username'      => $request->username,
            'alamat'        => $request->alamat,
        ];
        $data = User::where('id_user', $id)->update($data);
        if($data){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil diubah'
            ]);
        }else{
            return response()->json([
                'error'   => 1, 
                'message' => 'Data gagal diubah'
            ]);
        }
    }
}
