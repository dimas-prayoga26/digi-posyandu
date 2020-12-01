<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use App\Puskesmas;
use App\Posyandu;
use App\User;
use App\Gizi;
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
         return view('admin.dashboard', compact('puskes','posyandu','anak','bidan','kader','posBidan','anakBidan','posPuskes','bidanPuskes','anakAdmin'));
    }


    public function chart()
    {
       
    }
}
