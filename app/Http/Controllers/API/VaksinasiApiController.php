<?php

namespace App\Http\Controllers\API;

use App\Vaksinasi;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VaksinasiApiController extends Controller
{
    public function getAll(){
        $datas = Vaksinasi::all();
        return response()->json($datas);
    }

    public function create(Request $request){
        $data   = $request->only('nama_vaksinasi');
        $create = Vaksinasi::create($data);

        if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }

    public function update(Request $request, $id){
        $data   = $request->only('nama_vaksinasi');
        $update = Vaksinasi::where('id_Vaksinasi', $id)->update($data);
        
        if($update){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil diubah'
            ]);
        }
    }

    public function delete($id){
        $data = Vaksinasi::findOrFail($id);
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