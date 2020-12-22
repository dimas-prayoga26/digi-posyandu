<?php

namespace App\Exports;

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
 
class ImunisasiExport extends StringValueBinder implements WithCustomValueBinder, FromView, WithTitle
{
    use Exportable;

    private $puskesmas;
    private $name;

    public function __construct($puskesmas, $name)
    {
        $this->puskesmas = $puskesmas;
        $this->name = $name;
    }
    public function view(): View
    {
  
        $items = DB::table('imunisasi')
                ->join('vaksinasi', 'imunisasi.id_vaksinasi', '=', 'imunisasi.id_vaksinasi')
                ->join('anak', 'imunisasi.id_anak', '=', 'anak.id_anak')
                ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                ->select('vaksinasi.*','posyandu.*','puskesmas.*', 'desa.*', 'kecamatan.*')
                ->where('posyandu.id_posyandu', $this->puskesmas)
                ->first();

        $coba = DB::table('imunisasi')
                ->join('vaksinasi', 'imunisasi.id_vaksinasi', '=', 'vaksinasi.id_vaksinasi')
                ->join('anak', 'imunisasi.id_anak', '=', 'anak.id_anak')
                ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
                ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                ->select('vaksinasi.*','posyandu.*', 'desa.*', 'kecamatan.*',
                    DB::raw("SUM(CASE WHEN anak.jk = 'laki-laki' THEN 1 ELSE 0 END) AS l"), 
                    DB::raw("SUM(CASE WHEN anak.jk = 'perempuan' THEN 1 ELSE 0 END) AS p"))
                ->where('posyandu.id_posyandu', $this->puskesmas)
                ->groupBy('vaksinasi.nama_vaksinasi')
                ->get();

        $datas = Vaksinasi::all();
       
        return view('admin.imunisasi.exportimunisasi', compact('items','datas','coba'));
    }

    public function title(): string 
    {
        return ''.$this->name;
    }
}
