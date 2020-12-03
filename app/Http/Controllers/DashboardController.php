<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use App\Puskesmas;
use App\Posyandu;
use App\User;
use App\Gizi;
use App\Imunisasi;
use App\Vaksinasi;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $anak = Anak::count();
        $puskes = Puskesmas::count();
        $posyandu = Posyandu::count();  
        $bidan = User::where('level','bidan')->count();  
        $kader = User::where('level','kader')->count();  
        $posBidan =Posyandu::where('id_posyandu', session('posyandu'))->count();
        $anakBidan =Anak::where('id_posyandu', session('posyandu'))->count();
        $posPuskes = Posyandu::where('id_puskesmas', session('puskesmas'))->count();
        $bidanPuskes = DB::table('users')
                        ->join('posyandu', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                        ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                        ->where('posyandu.id_puskesmas', session('puskesmas'))
                        ->where('users.level', 'bidan')
                        ->count();

        $anakAdmin =DB::table('anak')
        ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
        ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
        ->where('posyandu.id_puskesmas', session('puskesmas'))
        ->count();  

        $stunting = DB::table('gizi')
        ->join('status_gizi', 'gizi.id_status_gizi', '=', 'status_gizi.id_status_gizi')
        ->whereIn('status_gizi.pb_tb_u',['SP','P'])
        ->select(DB::raw('count(*) as `count`'),DB::raw('YEAR(tgl_periksa) year, MONTH(tgl_periksa) month'))
        ->groupby('year','month')
        ->get();
       
       
         return view('admin.dashboard', compact('puskes','posyandu','anak','bidan','kader','posBidan','anakBidan','posPuskes','bidanPuskes','anakAdmin'));
    }


    public function chart()
    {
        $stuntingTinggiBadan = DB::table('gizi')
        ->join('status_gizi', 'gizi.id_status_gizi', '=', 'status_gizi.id_status_gizi')
        ->whereIn('status_gizi.pb_tb_u',['SP','P'])
        ->select(DB::raw('count(*) as `count`'),DB::raw('YEAR(tgl_periksa) year, MONTHNAME(tgl_periksa) month'))
        ->orderBy('tgl_periksa', 'ASC')
        ->groupby('year','month')
        ->get();
        return response()->json($stuntingTinggiBadan,200);
        /* $giziChart = DB::table('gizi')
        ->join('status_gizi', 'gizi.id_status_gizi', '=', 'status_gizi.id_status_gizi')
  
        ->select(DB::raw('count(*) as `count`'),DB::raw('YEAR(tgl_periksa) year, MONTH(tgl_periksa) month'))
        ->groupby('year','month')
        ->pluck('count','month');
        return response()->json($giziChart,200); */
       $imunisasiChart = DB::table('imunisasi')
                ->join('vaksinasi', 'imunisasi.id_vaksin', '=', 'vaksinasi.id_vaksin')
                ->select('id_vaksin',DB::raw('count(*) as total'))
                ->where()
                ->grupBy('id_vaksinasi')
                ->pluck('total');

                return view('admin.dashboard', compact('puskes','posyandu','anak','bidan','kader','posBidan','anakBidan','posPuskes','bidanPuskes','anakAdmin'));
    }
}
