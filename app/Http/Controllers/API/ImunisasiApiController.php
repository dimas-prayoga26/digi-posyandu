<?php

namespace App\Http\Controllers\API;

use DB;
use App\Anak;
use DateTime;
use App\Vaksinasi;
use App\Imunisasi;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImunisasiApiController extends Controller
{
    public function getAll(){
        $datas = Imunisasi::with('anak', 'vaksinasi')->get();
        return response()->json($datas);
    }

    public function getByPuskes($id){
        $datas = DB::table('imunisasi')
                    ->join('vaksinasi', 'vaksinasi.id_vaksinasi', '=', 'imunisasi.id_vaksinasi')
                    ->join('anak', 'anak.id_anak', '=', 'imunisasi.id_anak')
                    ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                    ->join('keluarga', 'keluarga.no_kk', 'anak.no_kk')
                    ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                    ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                    ->select('imunisasi.*', 'vaksinasi.*', 'anak.*', 'posyandu.*','kecamatan.*',
                        'puskesmas.*', 'keluarga.*')
                     ->where('puskesmas.id_puskesmas', $id)
                    ->get();
        return response()->json($datas);
    }

    public function getByPosyandu($id){
        $datas = Imunisasi::with('anak', function($anak){
                        $anak->where('id_posyandu', $id);
                    })
                    ->with('vaksinasi')
                    ->get();
        return response()->json($datas);
    }

    public function create(Request $request){
        $now          = date('Y-m-d');
        $countId      = Imunisasi::where('tgl_imunisasi', $now)->count();
        $increment    = ($countId + 1);
        $id_imunisasi = 'I'.date('Ymd').str_pad($increment, 5, '0', STR_PAD_LEFT);

        $data = [
            'no_pemeriksaan_imunisasi' => $id_imunisasi,
            'tgl_imunisasi'            => $now,
            'id_vaksinasi'             => $request->id_vaksinasi,
            'id_anak'                  => $request->id_anak
        ];
        
        $create = Imunisasi::create($data);

        if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }else{
            return response()->json([
                'error'   => 1, 
                'message' => 'Data gagal disimpan'
            ]);
        }
    }

    public function show($id){
        $data = Imunisasi::with('vaksinasi', 'anak')
                    ->where('no_pemeriksaan_imunisasi', $id)
                    ->get();
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $data = $request->only('id_vaksinasi', 'id_anak');
        $update = Imunisasi::where('no_pemeriksaan_imunisasi', $id)
                    ->update($data); 
        if($update){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil diubah'
            ]);
        }else{
            return response()->json([
                'error'   => 1, 
                'message' => 'Data gagal diubah'
            ]);
        }
    }
}
