<?php

namespace App\Http\Controllers;

use App\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {
        $datas = Jadwal::whereIdPuskesmas(session('puskesmas'))->get();
        return view('admin.admin_puskesmas.jadwal',compact('datas'))->with('i');    
    }

    public function create(Request $request)
    {
        $data = [
            'tanggal'      => $request->tanggal,
            'id_puskesmas' => session('puskesmas')
        ];

        $create = Jadwal::create($data);

        if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ],200);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data   = $request->only('tanggal');
        $update = Jadwal::where('id_jadwal',$id)->update($data);

        if($update){
            return response()->json([
                'error' => 0, 
                'message' => 'Data berhasil diubah'
            ],200);
        }
    }

    public function delete($id){
        $data = Jadwal::findOrFail($id);
        try {
            $data->delete();
            return response()->json([
                'error'     => 0,
                'message'   => 'Data berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error'     => 1,
                'message'   => 'Data gagal dihapus'
            ]); 
        }
    }
}
