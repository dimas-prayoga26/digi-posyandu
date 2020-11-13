<?php

namespace App\Http\Controllers\API;

use App\Anak;
use App\Gizi;
use App\StandarWho;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiziApiController extends Controller
{
    public function getAll(){
        $datas = Gizi::all();
        return response()->json($datas);
    }

    public function create(Request $request){
        $anak         = Anak::where('id_anak', $request->id_anak)->first();
        $tgl_lahir    = Carbon::parse($anak->tgl_lahir)->format('m');
        $tgl_periksa  = Carbon::parse($request->tgl_periksa)->format('m');
        $usia         = $tgl_periksa - $tgl_lahir;
        $ukur;
        if($usia > 25){
            $ukur = 1;
        }else{
            $ukur = 2;
        }
        $data = [
            'no_pemeriksaan_gizi' => $request->id_gizi,
            'usia'                => $usia,
            'pb_tb'               => $request->pb_tb,
            'bb'                  => $request->bb,
            'tgl_periksa'         => $request->tgl_periksa,
            'cara_ukur'           => $ukur,
            'asi_eks'             => $request->asi_eks,
            'vit_a'               => $request->vit_a,
            'validasi'            => $request->validasi,
            'id_status_gizi'      => $request->id_status_gizi,
            'id_anak'             => $request->id_anak
        ];
        
        $create = Gizi::create($data);

        if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }

    public function countWeightAge($jk, $age, $weight){
        $div = $weight/$age;

        $std = StandarWho::where('kategori', 'BB/U')
                ->where('jk', $jk)
                ->where('parameter', $age)
                ->get();
    }

    public function countHeightAge($jk, $height, $age){

    }

    public function countWeightHeight($jk, $weight, $height){
            
    }
}