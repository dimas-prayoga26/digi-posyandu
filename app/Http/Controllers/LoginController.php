<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    
    public function loginadmin()
    {
         return view('loginadmin');    
    }

    public function loginbidan()
    {
         return view('loginbidan');    
    }

    public function loginAdminPost(Request $request){
        $auth = auth()->guard('admins');

        $credentials = ['username' => $request->username, 'password' => $request->password];
    
        $validator = Validator::make($request->all(),
            [
                'username'  => 'required|string|exists:admin',
                'password'  => 'required|string',
            ], 
            [
                'username.exists'    => 'Akun tidak terdaftar',   
                'username.required'  => 'Username tidak boleh kosong',
                'password.required'  => 'Password tidak boleh kosong'
            ],
        );

        //if($validator->fails()) {
        //    return redirect()->back()->withErrors($validator);
        //}else{
            if($auth->attempt($credentials)){
                $admin = Admin::where('username', $request->username)->first();
                session()->put('admin', $admin->username);
                session()->put('nama_admin', $admin->nama);
                session()->put('level', $admin->level);
                session()->put('puskesmas', $admin->id_puskesmas);
                return redirect('dashboard')->with('success', 'Selamat Datang');
            }else{
                return redirect()
                    ->back()
                    ->withErrors(
                        ['username atau password anda salah']
                    );
            }
        //}
    }

    public function loginBidanPost(Request $request){
        $auth = auth()->guard('users');

        $credentials = $request->only('username', 'password');

        $validator = Validator::make($request->all(),
            [
                'username'  => 'required|string|exists:admin',
                'password'  => 'required|string',
            ], 
            [
                'username.exists'    => 'Akun tidak terdaftar',   
                'username.required'  => 'Username tidak boleh kosong',
                'password.required'  => 'Password tidak boleh kosong'
            ],
        );

        
            if($auth->attempt($credentials)){
                $user = User::where('username', $request->username)
                                ->where('level','bidan')->first();
                                session()->put('bidan', $user->username);
                                session()->put('name', $user->name);
                                session()->put('level', $user->level);
                                session()->put('posyandu', $user->id_posyandu);
                return redirect('dashboard')->with('success', 'Selamat Datang');
            }else{
                return redirect()
                    ->back()
                    ->withErrors(
                        ['password' => 'username atau password anda salah']
                    );
            }
    }

    public function logoutAdmin(){
        session()->forget('admin');
        return redirect('/login/admin');
    }
   
    public function logoutBidan(){
        session()->forget('bidan');
        return redirect('/login/bidan');
    }
}
