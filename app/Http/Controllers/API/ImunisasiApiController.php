<?php

namespace App\Http\Controllers\API;

use App\Imunisasi;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImunisasiApiController extends Controller
{
    public function getAll(){
        $datas = Imunisasi::all();
        return response()->json($datas);
    }

    public function create(Request $request){
        $data = [
            'no_pemeriksaan_imunisasi' => $request->id_imunisasi,
		    'tgl_imunisasi'            => $request->tgl_imunisasi,
		    'id_vaksinasi'             => $request->id_vaksinasi,
            'id_anak'                  => $request->id_puskesmas
        ];
        
        $create = Imunisasi::create($data);

        if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }

    public function update(Request $request, $id){
        $data = [
            'no_pemeriksaan_imunisasi' => $request->id_imunisasi,
		    'tgl_imunisasi'            => $request->tgl_imunisasi,
		    'id_vaksinasi'             => $request->id_vaksinasi,
            'id_anak'                  => $request->id_puskesmas
        ];
        $update = Imunisasi::where('no_pemeriksaan_imunisasi', $id)
                    ->update($data);
        
        if($update){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil diubah'
            ]);
        }
    }

    public function delete($id){
        $data = Imunisasi::findOrFail($id);
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