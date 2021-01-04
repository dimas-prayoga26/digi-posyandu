<?php 
namespace App\Exports;

use DB;
use App\Posyandu;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;


class GiziExportSheet implements WithMultipleSheets {
    use Exportable;
    
    private $puskesmas;
    private $month;
    private $year; 

    public function setPuskesmas(int $puskesmas){
        $this->puskesmas = $puskesmas;
    }

    public function setMonth(int $month){
        $this->month = $month;
    }

    public function setYear(int $year){
        $this->year = $year; 
    }

    public function sheets(): array {
        if (session('level')=='admin_puskesmas') {
            $posyandu = Posyandu::where('id_puskesmas', session('puskesmas'))
                            ->select('posyandu.*')
                            ->get();
            $sheets=[];

            foreach($posyandu as $data) {
                $sheets[]=new GiziExport($data->id_posyandu, $data->nama_posyandu);
            }

            return $sheets;
        }

        else if(session('level')=='super_admin') {
            $posyandu = Posyandu::where('id_puskesmas', $this->puskesmas)
                                ->select('posyandu.*')
                                ->get();
            $sheets=[];
            foreach($posyandu as $data) {
                $sheets[] = new SuperAdminExportGizi($this->month, $this->year, $this->puskesmas, $data->id_posyandu, $data->nama_posyandu);
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
