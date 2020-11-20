<?php

namespace App\Http\Controllers\API;

use DateTime;
use App\Anak;
use App\Gizi;
use App\StatusGizi;
use App\StandarWho;
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
        $tgl_lahir    = new DateTime($anak->tgl_lahir);
        $now          = new DateTime('now');;
        $year         = date_diff($now, $tgl_lahir)->y;
        $month        = date_diff($now, $tgl_lahir)->m;
        $usia         = ($year*12)+$month;
        $ukur         = $usia<25 ? 1 : 2;
        $tgl_periksa  = $now->format('Y-m-d');
        $countId      = Gizi::where('created_at', $tgl_periksa)->count();
        $increment    = $countId + 1;
        $id_gizi      = date('Ymd').'0000'.$increment;
        $bb           = $request->bb;
        $pb_tb        = $request->pb_tb;

        $bb_u         = $this->countWeightAge($bb, $anak->jk, $usia);
        $pb_tb_u      = $this->countHeightAge($pb_tb, $anak->jk, $usia);
        $bb_pb_tb     = $this->countWeightHeight($bb, $anak->jk, $pb_tb, $usia);

        $data_status = [
            'bb_u'      => $bb_u,
            'pb_tb_u'   => $pb_tb_u,
            'bb_pb_tb'  => $bb_pb_tb
        ];

        StatusGizi::create($data_status);
        $id_status = StatusGizi::where('bb_u', $bb_u)
                    ->where('pb_tb_u', $pb_tb_u)
                    ->where('bb_pb_tb', $bb_pb_tb)
                    ->value('id_status_gizi');
        
        $data_gizi = [
            'no_pemeriksaan_gizi' => $id_gizi,
            'usia'                => $usia,
            'pb_tb'               => $pb_tb,
            'bb'                  => $bb,
            'tgl_periksa'         => $request->tgl_periksa,
            'cara_ukur'           => $ukur,
            'asi_eks'             => $request->asi_eks,
            'vit_a'               => $request->vit_a,
            'validasi'            => $request->validasi,
            'id_status_gizi'      => $id_status,
            'id_anak'             => $request->id_anak
        ];
        
        $create = Gizi::create($data_gizi);

        if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }

    public function countWeightAge($weight, $gender, $age)
    {
        $status;
        $std    = StandarWho::where('kategori', 'BB/U')
                    ->where('jk', $gender)
                    ->where('parameter', $age)
                    ->first();
        if($weight < $std->sd_min_dua){
            return $status = "SK";
        }elseif($weight < $std->sd_min_satu && $weight >= $std->sd_min_dua){
            return $status = "K";
        }elseif($weight < $std->median && $weight >= $std->sd_min_satu){
            return $status = "BK";
        }elseif($weight < $std->sd_plus_satu && $weight >= $std->median){
            return $status = "N";
        }elseif($weight < $std->sd_plus_dua && $weight >= $std->sd_plus_satu){
            return $status = "BG";
        }elseif($weight < $std->sd_plus_tiga && $weight >= $std->sd_plus_dua){
            return $status = "G";
        }elseif($weight >= $std->sd_plus_tiga){
            return $status = "O";
        }   
    }
    public function countHeightAge($height, $gender, $age)
    {
        $status;
        //cara ukur
        $measure = $age<25 ? 1 : 2;

        if($measure == 1){
            $std = StandarWho::where('kategori', 'PB/U')
                ->where('jk', $gender)
                ->where('parameter', $age)
                ->first();    
        }elseif($measure == 2){
            $std = StandarWho::where('kategori', 'TB/U')
                ->where('jk', $gender)
                ->where('parameter', $age)
                ->first();
        }

        if($height < $std->sd_min_tiga){
            return $status = "SP";
        }elseif($height <= $std->sd_min_dua && $height >= $std->sd_min_tiga){
            return $status = "P";
        }elseif($height <= $std->sd_min_satu && $height > $std->sd_min_dua){
            return $status = "BP";  
        }elseif($height < $std->sd_plus_satu && $height >= $std->median){
            return $status = "N";
        }elseif($height < $std->sd_plus_dua && $height >= $std->sd_plus_satu){
            return $status = "BT";
        }elseif($height < $std->sd_plus_tiga && $height >= $std->sd_plus_dua){
            return $status = "T";
        }elseif($height >= $std->sd_plus_tiga){
            return $status = "ST";
        }   
    }

    public function countWeightHeight($weight, $gender, $height, $age)
    {
        $status;
        //cara ukur
        $measure = $age<25 ? 1 : 2;

        if($measure == 1){
            $std = StandarWho::where('kategori', 'BB/PB')
                ->where('jk', $gender)
                ->where('parameter', $height)
                ->first();    
        }elseif($measure == 2){
            $std = StandarWho::where('kategori', 'BB/TB')
                ->where('jk', $gender)
                ->where('parameter', $height)
                ->first();
        }
        
        if($weight < $std->sd_min_dua){
            return $status = "SK";
        }elseif($weight < $std->sd_min_satu && $weight >= $std->sd_min_dua){
            return $status = "K";
        }elseif($weight < $std->median && $weight >= $std->sd_min_satu){
            return $status = "BK";
        }elseif($weight < $std->sd_plus_satu && $weight >= $std->median){
            return $status = "N";
        }elseif($weight < $std->sd_plus_dua && $weight >= $std->sd_plus_satu){
            return $status = "BG";
        }elseif($weight < $std->sd_plus_tiga && $weight >= $std->sd_plus_dua){
            return $status = "G";
        }elseif($weight >= $std->sd_plus_tiga){
            return $status = "O";
        }           
    }
}
