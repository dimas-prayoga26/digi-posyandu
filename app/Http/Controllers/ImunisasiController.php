<?php

namespace App\Http\Controllers;
use App\Vaksinasi;
use App\Anak;
use App\Imunisasi;
use App\Puskesmas;
use DB;
use Illuminate\Http\Request;
use App\Exports\ImunisasiExport;
use App\Exports\ImunisasiExportSheet;
use App\Exports\SuperAdminExportGizi;
use App\Exports\BidanImunisasiExport;
use Maatwebsite\Excel\Facades\Excel; 

class ImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    $level = session('level');
    if($level == 'super_admin' || $level == 'bidan' || $level == 'admin_puskesmas'){    
        $puskesmas = Puskesmas::all();
        $years = Imunisasi::select(DB::raw('YEAR(tgl_imunisasi) year'))->groupBy('year')->get();
        $level = session('level'); 
        
        if ($level == 'admin_puskesmas') {
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
                         ->where('puskesmas.id_puskesmas', session('puskesmas'))
                        ->get();

           
        }else if($level == 'super_admin' || $level == 'bidan'){
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
                        ->get();      
        }
        return view('admin.imunisasi.imunisasi', compact('datas','puskesmas','years'));
    }else{
        return redirect()->back();
        } 
    }

    public function search(Request $request){
        $search = $request->get('query');
        $level = session('level');
        if($search != ''){
            if($level == 'admin_puskesmas'){
                $data = DB::table('imunisasi')
                            ->join('vaksinasi', 'vaksinasi.id_vaksinasi', '=', 'imunisasi.id_vaksinasi')
                            ->join('anak', 'imunisasi.id_anak', '=', 'anak.id_anak')
                            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                            ->select('imunisasi.*', 'anak.nama_anak', 'anak.nik', 'vaksinasi.nama_vaksinasi')
                            ->where('posyandu.id_puskesmas', session('puskesmas'))
                            ->where('nama_anak', 'like', '%'.$search.'%')
                            ->OrWhere('nik', 'like', '%'.$search.'%')
                            ->OrWhere('tgl_imunisasi', 'like', '%'.$search.'%')
                            ->OrWhere('nama_vaksinasi', 'like', '%'.$search.'%')
                            ->get();
            }else if($level == 'super_admin'){
                $data = DB::table('imunisasi')
                            ->join('vaksinasi', 'vaksinasi.id_vaksinasi', '=', 'imunisasi.id_vaksinasi')
                            ->join('anak', 'imunisasi.id_anak', '=', 'anak.id_anak')
                            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                            ->select('imunisasi.*', 'anak.nama_anak', 'anak.nik', 'vaksinasi.nama_vaksinasi')
                            ->where('nama_anak', 'like', '%'.$search.'%')
                            ->OrWhere('nik', 'like', '%'.$search.'%')
                            ->OrWhere('tgl_imunisasi', 'like', '%'.$search.'%')
                            ->OrWhere('nama_vaksinasi', 'like', '%'.$search.'%')
                            ->get();
            }else if($level == 'bidan'){
                $data = DB::table('imunisasi')
                            ->join('vaksinasi', 'vaksinasi.id_vaksinasi', '=', 'imunisasi.id_vaksinasi')
                            ->join('anak', 'imunisasi.id_anak', '=', 'anak.id_anak')
                            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                            ->select('imunisasi.*', 'anak.nama_anak', 'anak.nik', 'vaksinasi.nama_vaksinasi')
                            ->where('id_posyandu', session('posyandu'))
                            ->where('nama_anak', 'like', '%'.$search.'%')
                            ->OrWhere('nik', 'like', '%'.$search.'%')
                            ->OrWhere('tgl_imunisasi', 'like', '%'.$search.'%')
                            ->OrWhere('nama_vaksinasi', 'like', '%'.$search.'%')
                            ->get();
            }
        }else {
            $data = DB::table('imunisasi')
                        ->join('vaksinasi', 'vaksinasi.id_vaksinasi', '=', 'imunisasi.id_vaksinasi')
                        ->join('anak', 'imunisasi.id_anak', '=', 'anak.id_anak')
                        ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                        ->select('imunisasi.*', 'anak.nama_anak', 'anak.nik', 'vaksinasi.nama_vaksinasi')
                        ->get();
        }
        return response()->json($data);
    }

    public function export_imunisasi(){
        if (session('level') == 'admin_puskesmas'){
            try {
                return Excel::download(new ImunisasiExportSheet, 'imunisasi.xlsx');
            } catch (\Exception $e) {
                return back()->withErrors('Data Kosong');
            }
            
        }else{
            echo "Maaf anda tidak mempunyai akses";
        }
    }

    public function export_imunisasi_superadmin(Request $request){
        if (session('level') == 'super_admin'){
            try {
            $export = new ImunisasiExportSheet();
            $export->setPuskesmas($request->id_puskesmas);
            $export->setMonth($request->id_month);
            $export->setYear($request->id_year);
            return Excel::download($export, 'superadminimunisasi.xlsx');
            } catch (\Exception $e) {
                return back()->withErrors('Data Kosong');
            }
            
        }else{
            echo "Maaf anda tidak mempunyai akses";
        }
    }

    public function export_imunisasi_bidan(){
        if (session('level') == 'bidan'){
            try {
                 return Excel::download(new BidanImunisasiExport, 'imunisasi.xlsx');
            } catch (\Exception $e) {
                return back()->withErrors('Data Kosong');   
            }
           
        }else{
            echo "Maaf anda tidak mempunyai akses";
        }
    }
}
    