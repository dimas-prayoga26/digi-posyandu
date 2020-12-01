<?php

namespace App\Http\Controllers;
use App\Gizi;
use App\Anak;
use App\Puskesmas;
use App\StatusGizi;
use App\Keluarga;
use DB;
use Illuminate\Http\Request;
use App\Exports\GiziExportSheet;
use App\Exports\SuperAdminExportGizi;
use Maatwebsite\Excel\Facades\Excel;

class GiziController extends Controller
{

    public function index()
    {
        $puskesmas = Puskesmas::all();
        if (session('level') == 'admin_puskesmas'){
            $datas = DB::table('gizi')
                ->join('status_gizi', 'status_gizi.id_status_gizi', '=', 'gizi.id_status_gizi')
                ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                ->join('keluarga', 'keluarga.no_kk', 'anak.no_kk')
                ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                ->select('gizi.*', 'anak.*', 'posyandu.nama_posyandu',
                    'puskesmas.*', 'keluarga.*', 'status_gizi.*', 'desa.nama_desa', 'kecamatan.nama_kecamatan')
                ->where('puskesmas.id_puskesmas', session('puskesmas'))
                ->get();
            
                return view('admin.gizi.gizi', compact('datas', 'puskesmas'));
        }elseif (session('level') == 'bidan') {
                $datas = DB::table('gizi')
                ->join('status_gizi', 'status_gizi.id_status_gizi', '=', 'gizi.id_status_gizi')
                ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                ->join('keluarga', 'keluarga.no_kk', 'anak.no_kk')
                ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                ->select('gizi.*', 'anak.*', 'posyandu.nama_posyandu',
                    'puskesmas.*', 'keluarga.*', 'status_gizi.*', 'desa.nama_desa', 'kecamatan.nama_kecamatan')
                ->where('posyandu.id_posyandu', session('posyandu'))
                ->get();
            
            return view('admin.gizi.gizi', compact('datas'));
        }else{
            $datas = DB::table('gizi')
            ->join('status_gizi', 'status_gizi.id_status_gizi', '=', 'gizi.id_status_gizi')
            ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
            ->join('keluarga', 'keluarga.no_kk', 'anak.no_kk')
            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
            ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
            ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
            ->select('gizi.*', 'anak.*', 'posyandu.nama_posyandu',
                'puskesmas.*', 'keluarga.*', 'status_gizi.*', 'desa.nama_desa', 'kecamatan.nama_kecamatan')
            ->get();
            return view('admin.gizi.gizi', compact('datas', 'puskesmas'));
        }    
    }

    public function export_gizi(){
        return Excel::download(new GiziExportSheet, 'gizi.xlsx');
    }

    public function export_gizi_superadmin(Request $request){
        $export = new GiziExportSheet();
        $export->setPuskesmas($request->id_puskesmas);
        return Excel::download($export, 'superadmingizi.xlsx');
    }
}
