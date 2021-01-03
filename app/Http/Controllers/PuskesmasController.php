<?php

namespace App\Http\Controllers;
use App\Puskesmas;

use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    public function puskesmas() 
   {
    //
   }

    public function index()
    {
        $level = session('level');
        if($level == 'super_admin' || $level == 'bidan' || $level == 'admin_puskesmas'){
        $datas = Puskesmas::all();
        return view('admin.puskesmas.puskesmas',compact('datas'))->with('i');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
         $request->validate([
            'nama_puskesmas' => 'required|unique:puskesmas|string',
            'alamat' => 'required'

        ],
        [
            'nama_puskesmas.required'    => 'Nama puskesmas harus diisi',
            'nama_puskesmas.unique'     => 'Nama Puskesmas sudah ada',
            'alamat.required'          => 'Alamat harus diisi',
            'max'                       => 'panjang karakter maksimal 100',
        ]);
       $data = $request->only('nama_puskesmas', 'alamat');
        Puskesmas::create($data);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_puskesmas' => 'required|string',
            'alamat' => 'required'

        ],
        [
            'nama_puskesmas.required'   => 'Nama puskesmas harus diisi',
            'alamat.required'           => 'Alamat harus diisi',
            'max'                       => 'panjang karakter maksimal 100',
        ]);

        $data = $request->only('nama_puskesmas','alamat');
        Puskesmas::whereIdPuskesmas($id)->update($data);
        return redirect()->back()->with('success', 'Data berhasil  diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        
   

    public function delete($id)
    {
        $data = Puskesmas::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}