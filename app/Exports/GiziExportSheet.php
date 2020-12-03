<?php namespace App\Exports;

use DB;
use App\Posyandu;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;


class GiziExportSheet implements WithMultipleSheets {
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    private $puskesmas;

    public function setPuskesmas(int $puskesmas){
        $this->puskesmas = $puskesmas;
    }

    public function sheets(): array {
        //dd($this->puskesmas);
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
            //dd($this->puskesmas);
            $posyandu=Posyandu::where('id_puskesmas', $this->puskesmas)
                ->select('posyandu.*')
                ->get();
            $sheets=[];
            foreach($posyandu as $data) {
                $sheets[] = new SuperAdminExportGizi($data->id_posyandu, $data->nama_posyandu);
            }

            return $sheets;
        }
    }
}
