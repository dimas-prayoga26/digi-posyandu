<?php

namespace App\Http\Controllers;

use DB;
use App\Gizi;
use App\Puskesmas;
use Illuminate\Http\Request;
use App\Exports\GiziExportSheet;
use App\Exports\SuperAdminExportGizi;
use App\Exports\BidanGiziExport;
use Maatwebsite\Excel\Facades\Excel;

class GiziController extends Controller
{

    public function index()
    {
        $puskesmas = Puskesmas::all();
        $years = Gizi::select(DB::raw('YEAR(tgl_periksa) year'))->groupBy('year')->get();
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
        }elseif (session('level') == 'super_admin'){
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
        }    
        return view('admin.gizi.gizi', compact('datas','puskesmas', 'years'));
    }

    public function search(Request $request){
        $search = $request->get('query');
        $level = session('level');
        if($search != ''){
            if($level == 'admin_puskesmas'){
                $data = DB::table('gizi')
                            ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                            ->select('gizi.*', 'anak.*', 'posyandu.*')
                            ->where('posyandu.id_puskesmas', session('puskesmas'))
                            ->where('nama_anak', 'like', '%'.$search.'%')
                            ->OrWhere('nik', 'like', '%'.$search.'%')
                            ->OrWhere('tgl_periksa', 'like', '%'.$search.'%')
                            ->OrWhere('usia', 'like', '%'.$search.'%')
                            ->get();
            }else if($level == 'super_admin'){
                $data = DB::table('gizi')
                            ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                            ->select('gizi.*', 'anak.*', 'posyandu.*')
                            ->where('nama_anak', 'like', '%'.$search.'%')
                            ->OrWhere('nik', 'like', '%'.$search.'%')
                            ->OrWhere('tgl_periksa', 'like', '%'.$search.'%')
                            ->OrWhere('usia', 'like', '%'.$search.'%')
                            ->get();
            }else if($level == 'bidan'){
                $data = DB::table('gizi')
                            ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                            ->select('gizi.*', 'anak.*', 'posyandu.*')
                            ->where('id_posyandu', session('posyandu'))
                            ->where('nama_anak', 'like', '%'.$search.'%')
                            ->OrWhere('nik', 'like', '%'.$search.'%')
                            ->OrWhere('tgl_periksa', 'like', '%'.$search.'%')
                            ->OrWhere('usia', 'like', '%'.$search.'%')
                            ->get();
            }
        }else {
            $data = DB::table('gizi')
                        ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                        ->select('gizi.*', 'anak.*')
                        ->get();
        }
        return response()->json($data);
    }

    public function export_gizi(){
        if (session('level') == 'admin_puskesmas'){
            try {
                return Excel::download(new GiziExportSheet, 'gizi.xlsx');
            } catch (\Exception $e) {
                return back()->withErrors('Data Kosong');
            }
        }else{
            echo "Maaf anda tidak mempunyai akses";
        }  
    }

    public function export_gizi_superadmin(Request $request){
        if (session('level') == 'super_admin'){    
          
            $export = new GiziExportSheet();
            $export->setPuskesmas($request->id_puskesmas);
            $export->setMonth($request->id_month);
            $export->setYear($request->id_year);
                return Excel::download($export, 'superadmingizi.xlsx');
          
         
        }     
    }
     public function export_gizi_bidan(){
        if (session('level') == 'bidan'){
            try {
                return Excel::download(new BidanGiziExport, 'gizi.xlsx');
            } catch (\Exception $e) {
                return back()->withErrors('Data Kosong');
            }  
        }else{
            echo "Maaf anda tidak mempunyai akses";
        }
    }
}
