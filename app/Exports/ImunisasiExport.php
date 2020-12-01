<?php

namespace App\Exports;

use App\Imunisasi;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ImunisasiExport extends StringValueBinder implements WithCustomValueBinder, FromView, ShouldAutoSize, WithTitle
{
	use Exportable;

	/*private $imunisasi;
	private $name;


    /**
    * @return \Illuminate\Support\Collection
    */

    /*
    function __construct($imunisasi,$name)
    {
    	$this->imunisasi = $imunisasi;
    	$this->name = $name;

    }
    */


    public function view(): View
    {
        $datas = Imunisasi::all();

        return view('admin.imunisasi.exportimunisasi', [
            'datas'     => $datas
           
        ]);
    }

    

    public function title(): string 
    {
        return ''.$this->name;
    }
}
