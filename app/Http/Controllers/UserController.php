<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posyandu;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function kader()
   {
       $datas    = User::where('level','kader')->get();
       $posyandu = Posyandu::all();
       return view('admin.kader.kader', compact('posyandu','datas'));
   }

   public function bidan()
   {
       $datas    = User::where('level','bidan')->get();
       $posyandu = Posyandu::all();
       return view('admin.bidan.bidan', compact('posyandu','datas'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBidan(Request $request)
    {
        $data = [
            'name'          =>$request->name,
            'username'      =>$request->username, 
            'password'      =>$request->password,
            'jk'            =>$request->jk,
            'alamat'        =>$request->alamat,
            'level'         =>'bidan',
            'id_posyandu'   =>$request->posyandu
        ];
        $create = User::create($data);
        return redirect()->back()->with('success','Data Berhasil Ditambah');
    }
    
    public function createKader(Request $request)
    {
        $data = [
            'name'          =>$request->name,
            'username'      =>$request->username, 
            'password'      =>$request->password,
            'jk'            =>$request->jk,
            'alamat'        =>$request->alamat,
            'level'         =>'kader',
            'id_posyandu'   =>$request->posyandu
        ];
        $create = User::create($data);
        return redirect()->back()->with('success','Data Berhasil Ditambah');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
