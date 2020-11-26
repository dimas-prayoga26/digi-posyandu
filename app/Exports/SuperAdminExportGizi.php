<?php

namespace App\Exports;
use DB;
use App\Gizi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SuperAdminExportGizi extends StringValueBinder implements FromView, ShouldAutoSize
{
    use Exportable;
    public function view(): View
    {

        return view('admin.gizi.exportgizi', [
            'datas' => DB::table('gizi')
            ->join('status_gizi', 'status_gizi.id_status_gizi', '=', 'gizi.id_status_gizi')
            ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
            ->join('keluarga', 'keluarga.no_kk', 'anak.no_kk')
            // ->join('kecamatan', 'kecamatan.id_kecamatan', 'posyandu.id_kecamatan')
            ->join('posyandu', 'anak.id_posyandu', '=', 'posyandu.id_posyandu')
            ->join('puskesmas', 'posyandu.id_puskesmas', '=', 'puskesmas.id_puskesmas')
            ->select('gizi.*', 'anak.*', 'posyandu.nama_posyandu',
                 'puskesmas.id_puskesmas','puskesmas.nama_puskesmas'
                 , 'keluarga.*', 'status_gizi.*')
                 ->where('puskesmas.id_puskesmas', $datas->id_puskesmas) 
            ->get()
        ]);
        // return view('admin.gizi.exportgizi', [
        //     'datas' => Gizi::all()
        // ]);
        // return Gizi::all();
    }
}
