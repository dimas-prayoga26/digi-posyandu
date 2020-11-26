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
        $request->validate([
            'username' => 'required|unique:users|string|max:100', 
            'password' => 'required|string|min:5',
            'name' => 'required|string',
            'alamat' => 'required|string',
            'jk' => 'required|string' ,
            'id_posyandu' => 'required' 
        ],
        [
            'username.unique'           => 'Username sudah ada yang pakai',
            'username.required'         => 'Username harus diisi',
            'name.required'             => 'Nama harus diisi',
            'alamat.required'           => 'Alamat harus diisi',
            'password.required'         => 'Password harus diisi', 
            'id_posyandu.required'      => 'Posyandu harus diisi',
            'jk.required'               => 'Jenis Kelamin harus diisi',
            'max'                       => 'panjang karakter maksima 100',
        ]);
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
         $request->validate([
            'username' => 'required|unique:users|string|max:100', 
            'password' => 'required|string|min:5',
            'name' => 'required|string',
            'alamat' => 'required|string',
            'jk' => 'required|string'  
        ],
        [
            'username.unique'           => 'Username sudah ada yang pakai',
            'username.required'         => 'Username harus diisi',
            'name.required'             => 'Nama harus diisi',
            'alamat.required'           => 'Alamat harus diisi',
            'password.required'         => 'Password harus diisi', 
            'id_posyandu.required'      => 'Posyandu harus diisi',
            'jk.required'               => 'Jenis Kelamin harus diisi',
            'max'                       => 'panjang karakter maksima 100',
        ]);
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
    public function updateBidan(Request $request, $id)
    {
        
        $user= User::whereIdPosyandu($id);
        if ($request->filled('password')) {
            $user->update([
                'name'         => $request->name,
                'alamat'       => $request->alamat,
                'id_posyandu'  => $request->posyandu,
                'password'     => $request->password,
            ]);
        } else {
            $user->update($request->except('password'));
        }
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    
    public function updateKader(Request $request, $id)
    {
        $user= User::whereIdPosyandu($id);
        if ($request->filled('password')) {
            $user->update([
                'name'         => $request->name,
                'alamat'       => $request->alamat,
                'id_posyandu'  => $request->posyandu,
                'password'     => $request->password,
            ]);
        } else {
            $user->update($request->except('password'));
        }
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = User::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
