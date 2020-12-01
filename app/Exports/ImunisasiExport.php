<?php

namespace App\Exports;

use DB;
use App\Imunisasi;
use App\Desa;
use App\Posyandu;
use App\Kecamatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ImunisasiExport extends StringValueBinder implements WithCustomValueBinder, FromView, ShouldAutoSize
{
	use Exportable;
    public function view(): View
    {
        $datas = Imunisasi::all();

        return view('admin.imunisasi.exportimunisasi', [
            'datas'     => $datas
           
        ]);
    }
}
