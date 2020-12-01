<?php

namespace App\Exports;

use App\Gizi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;

class GiziExport extends StringValueBinder implements FromView
{
    use Exportable;
    public function view(): View
    {
        return view('admin.gizi.exportgizi', [
            'datas' => Gizi::all()
        ]);
        // return Gizi::all();
    }
}
