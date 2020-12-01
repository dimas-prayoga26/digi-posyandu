<?php

namespace App\Exports;

use DB;
use App\Gizi;
use App\Desa;
use App\Posyandu;
use App\Kecamatan;
use Illuminate\Contracts\View\View;
use App\Puskesmas;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class GiziExport extends StringValueBinder 
implements WithCustomValueBinder, FromView, ShouldAutoSize, WithTitle
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
            ->where('posyandu.id_posyandu', $this->puskesmas)
            ->get();
        $desa       = Desa::where('desa.id_desa', session('puskesmas'))->count();
        $kecamatan  = kecamatan::where('kecamatan.nama_kecamatan', session('puskesmas'))->get();
        $puskesmas  = Puskesmas::where('puskesmas.nama_puskesmas', session('puskesmas'))->get();
        $posyandu   = Posyandu::where('id_puskesmas', session('puskesmas'))->count();
        $items      = DB::table('puskesmas')
                        ->join('posyandu', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
                        ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                        ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')
                        ->select('kecamatan.nama_kecamatan', 'puskesmas.nama_puskesmas', 'desa.rt', 'desa.rw')
                        ->where('puskesmas.id_puskesmas', session('puskesmas'))
                        ->first();

        return view('admin.gizi.exportgizi', [
            'datas'     => $datas,
            'desa'      => $desa,
            'posyandu'  => $posyandu,
            'kecamatan' => $kecamatan,
            'puskesmas' => $puskesmas,
            'items'     => $items
        ]);
    }

    public function title(): string 
    {
        return ''.$this->name;
    }
}
