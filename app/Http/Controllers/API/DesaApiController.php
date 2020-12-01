<?php

namespace App\Http\Controllers\API;

use App\Desa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesaApiController extends Controller
{
    public function getAll(){
        $datas = Desa::with('kecamatan')->get();
        return response()->json($datas);
    }

    public function getById($id){
      $data = Desa::with('kecamatan')
	     	->where('id_desa',$id)
		->get();
      return response()->json($data);
    }
}
