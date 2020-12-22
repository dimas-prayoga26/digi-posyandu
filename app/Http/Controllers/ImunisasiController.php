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
        $puskesmas = Puskesmas::all();
        if (session('level') == 'admin_puskesmas') {
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

       
        }else{
        
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

         return view('admin.imunisasi.imunisasi', compact('datas','puskesmas'));
    }


    public function export_imunisasi(){
        
        return Excel::download(new ImunisasiExportSheet, 'imunisasi.xlsx');
    }
 public function export_imunisasi_superadmin(Request $request){
        $export = new ImunisasiExportSheet();
        $export->setPuskesmas($request->id_puskesmas);
        return Excel::download($export, 'superadmingizi.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
