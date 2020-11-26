<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Puskesmas;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminpuskesmas()
   {
        $puskes = Puskesmas::all();
        $datas  = Admin::where('level', 'admin_puskesmas')->get();
       return view('admin.admin_puskesmas.admin_puskesmas', compact('puskes', 'datas'));
   }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'username'      => 'required|unique:admins|string|max:100', 
            'password'      => 'required|string|min:5',
            'nama'          => 'required|string',
            'alamat'        => 'required|string',
            'jk'            => 'required'
        ],
        [
            'username.unique'           => 'Username sudah ada yang pakai',
            'username.required'         => 'Username harus diisi',
            'nama.required'             => 'Nama harus diisi',
            'alamat.required'           => 'Alamat harus diisi',
            'password.required'         => 'Password harus diisi', 
            'jk.required'               => 'Jenis Kelamin harus diisi',
            'max'                       => 'panjang karakter maksima 100',
        ]);
        $data = [
            'username'      =>$request->username,  
            'password'      =>$request->password, 
            'nama'          =>$request->nama, 
            'jk'            =>$request->jk, 
            'level'         =>'admin_puskesmas', 
            'alamat'        =>$request->alamat, 
            'id_puskesmas'  =>$request->puskes

        ];
        $create = Admin::create($data);
        return redirect()->back()->with('success','Data Berhasil Ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
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
        $data = $request->only('nama','jk','alamat','id_puskesmas');
        Admin::whereIdAdmin($id)->update($data);
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
        $data = Admin::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
