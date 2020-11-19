<?php

namespace App\Http\Controllers\API;

use App\Desa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesaApiController extends Controller
{
    public function getAll(){
        $datas = Desa::all();
        return response()->json($datas);
    }
}
