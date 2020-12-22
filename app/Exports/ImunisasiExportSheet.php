<?php

namespace App\Exports;

use App\Imunisasi;
use DB;
use App\Desa;
use App\Posyandu;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;


class ImunisasiExportSheet implements WithMultipleSheets 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    private $puskesmas;
    private $posyandu;

     public function setPuskesmas(int $puskesmas){
        $this->puskesmas = $puskesmas;
    }
    public function setPosyandu(int $posyandu){
        $this->posyandu = $posyandu;
    }

    public function sheets(): array {
        //dd($this->puskesmas);
        if (session('level')=='admin_puskesmas') {
            $posyandu = DB::table('posyandu')
                            ->join('desa', 'posyandu.id_desa', '=', 'desa.id_desa')
                            ->where('id_puskesmas', session('puskesmas'))
                            ->select('posyandu.id_posyandu', 'desa.nama_desa')
                            ->get();
            $sheets=[];

            foreach($posyandu as $data) {
                $sheets[] =new ImunisasiExport($data->id_posyandu, $data->nama_desa);
            }

            return $sheets;
        }

        else if(session('level')=='super_admin') {
            //dd($this->puskesmas);
            $posyandu=Posyandu::with('desa')
                ->where('id_puskesmas', $this->puskesmas)
                ->select('posyandu.*')
                ->get();
            $sheets=[];
            foreach($posyandu as $data) {
                $sheets[] = new SuperAdminExportImunisasi($data->id_posyandu, $data->nama_posyandu);
            }

            return $sheets;
        }
         else if(session('level')=='bidan') {
            $pos=Posyandu::with('desa')
                ->where('id_posyandu', $this->posyandu)
                ->select('posyandu.*')
                ->get();
            $sheets=[];
            foreach($pos as $data) {
                $sheets[] = new BidanImunisasiExport($data->id_posyandu, $data->nama_desa);
            }
            return $sheets;
        }
    }
}
