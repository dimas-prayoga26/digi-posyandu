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
            $user = User::with('posyandu.puskesmas')->where('username', $username)->first();
            return response()->json([
		        'error'   => 0,
                'message' => 'Login berhasil',
		        'user'    => $user
            ]);
        }
        else {
            return response()->json([
                'error'   => 1, 
                'message' => 'Gagal Login'
            ]);
        }
    }

    public function show($id){
        $data = User::with('posyandu')->where('id_user', $id)->get();
        return respons()->json($data);
    }

    public function update(Request $request, $id){
        $user = $request->only('username', 'name', 'alamat');
        $data = User::with('posyandu')->where('id_user', $id)->update($user);
        if($data){
            return response()->json($data);
        }else{
            return response()->json([
                'error'   => 1, 
                'message' => 'Data gagal diubah'
            ]);
        }
    }
}
