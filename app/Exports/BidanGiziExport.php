<?php

namespace App\Exports;

use App\Gizi;
use DB;
use App\Imunisasi;
use App\Desa;
use App\Posyandu;
use App\Kecamatan;
use App\Puskesmas;
use App\Vaksinasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BidanGiziExport extends StringValueBinder  implements  WithCustomValueBinder, FromView, ShouldAutoSize, WithTitle
{
    use Exportable;
    
    public function view(): View
    {

        $datas = DB::table('gizi')
                    ->join('status_gizi', 'status_gizi.id_status_gizi', '=', 'gizi.id_status_gizi')
                    ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                    ->join('keluarga', 'keluarga.no_kk', 'anak.no_kk')
                    ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                    ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                    ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                    ->select('gizi.*', 'anak.*', 'posyandu.*','puskesmas.*', 'keluarga.*', 
                            'status_gizi.*', 'desa.*', 'kecamatan.*')
                    ->where('posyandu.id_posyandu', session('posyandu'))
                    ->get();

        $items = DB::table('gizi')
                    ->join('status_gizi', 'status_gizi.id_status_gizi', '=', 'gizi.id_status_gizi')
                    ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
                    ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                    ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                    ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                    ->select('posyandu.*','puskesmas.*', 'desa.*', 'kecamatan.*')
                    ->where('posyandu.id_posyandu', session('posyandu'))
                    ->first();

        return view('admin.gizi.exportgizi', compact('datas', 'items'));
    }

    public function title(): string 
    {
        $name = Posyandu::whereIdPosyandu(session('posyandu'))->value('nama_posyandu');
        return ''.$name;
    }
}