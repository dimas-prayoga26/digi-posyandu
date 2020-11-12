<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginadmin()
    {
         return view('loginadmin');    
    }

    public function loginbidan()
    {
         return view('loginbidan');    
    }
    public function loginAdminPost(Request $request){
        $auth = auth()->guard('admin');

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

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $admin = Admin::where('username', $request->username)->first();
                session()->put('admin', $admin->username);
                session()->put('nama_admin', $admin->nama);
                session()->put('level', $admin->level);
                alert()->success('Login success','Anda berhasil login');
                return redirect('/admin/dashboard');
            }else{
                return redirect()
                    ->back()
                    ->withErrors(
                        ['password' => 'password anda salah']
                    );
            }
        }
    }

    public function loginBidanPost(Request $request){
        $auth = auth()->guard('user');

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

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $admin = User::where('username', $request->username)
                                ->where('level','bidan')->first();
                session()->put('admin', $admin->username);
                session()->put('nama_admin', $admin->nama);
                alert()->success('Login success','Anda berhasil login');
                return redirect('/admin/DashboardAdmin');
            }else{
                return redirect()
                    ->back()
                    ->withErrors(
                        ['password' => 'password anda salah']
                    );
            }
        }
    }

    public function logoutAdmin(){
        session()->forget('admin');
        alert()->info('Anda Sudah Logout', 'Logout');
        return redirect('/admin/loginAdmin');
    }
   
    public function logoutBidan(){
        session()->forget('user');
        alert()->info('Anda Sudah Logout', 'Logout');
        return redirect('/admin/loginAdmin');
    }
}