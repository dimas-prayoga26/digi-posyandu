<?php

namespace App\Exports;

use DB;
use App\Imunisasi;
use App\Desa;
use App\Posyandu;
use App\Kecamatan;
use App\Puskesmas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ImunisasiExport extends StringValueBinder implements WithCustomValueBinder, FromView,
 ShouldAutoSize
{
    use Exportable;
    
    public function view(): View 
    {
        $datas = DB::table('imunisasi')
            ->join('vaksinasi', 'vaksinasi.id_vaksinasi', '=', 'imunisasi.id_vaksinasi')
            ->join('anak', 'imunisasi.id_anak', '=', 'anak.id_anak')
            ->join('keluarga', 'keluarga.no_kk', 'anak.no_kk')
            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
            ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
            ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
            ->select('imunisasi.*', 'anak.*', 'posyandu.*','puskesmas.*', 'keluarga.*', 
                    'vaksinasi.*', 'desa.*', 'kecamatan.*')
            ->where('posyandu.id_posyandu', session('puskesmas'))
            ->get();
            dd($datas);
        $items      = DB::table('puskesmas')
                        ->join('posyandu', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                        ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                        ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                        ->select('kecamatan.nama_kecamatan', 'puskesmas.nama_puskesmas', 'desa.rt', 'desa.rw')
                        ->where('puskesmas.id_puskesmas', session('puskesmas'))
                        ->first();
                        
        return view('admin.imunisasi.exportimunisasi', [
            'datas'     => $datas,
            'items'     => $items
        ]);
    }
}
