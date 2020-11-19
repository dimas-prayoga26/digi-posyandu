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
                $user
            ]);
        }
        else {
            return response()->json(['status' => 'fail']);
        }
    }
}
