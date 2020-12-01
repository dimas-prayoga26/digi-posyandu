<?php

namespace App\Exports;

use DB;
use App\Posyandu;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
class GiziExportSheet implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $puskesmas;
    //protected $posyandu;
    public function __constructor(int $puskesmas)
    {
        $this->$puskesmas = $puskesmas;
    }
    public function sheets(): array
    {
        //$length = Posyandu::where('id_puskesmas', session('puskesmas'))->count(); 
        $posyandu = Posyandu::where('id_puskesmas', session('puskesmas'))
                    ->select('posyandu.*')
                    ->get();
                    //->value('nama_posyandu');
        $sheets = [];
        foreach($posyandu as $data){
            $sheets[] = new GiziExport($data->id_posyandu, $data->nama_posyandu);
        } 
        return $sheets;
    }
}
