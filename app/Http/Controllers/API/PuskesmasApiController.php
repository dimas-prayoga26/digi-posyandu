<?php

namespace App\Http\Controllers\API;

use App\Puskesmas;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PuskesmasApiController extends Controller
{
    public function getAll(){
        $datas = Puskesmas::all();
        return response()->json($datas);
    }

    public function create(Request $request){
        $data = $request->only('nama_puskesmas', 'alamat');
        $create = Puskesmas::create($data);

        if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }

    public function update(Request $request, $id){
        $data   = $request->only('nama_puskesmas', 'alamat');
        $update = Puskesmas::where('id_puskesmas', $id)->update($data);
        
        if($update){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil diubah'
            ]);
        }
    }
}