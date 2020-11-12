<?php

namespace App\Http\Controllers\API;

use App\StandarWho;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StandarWhoApiController extends Controller
{
    public function getAll(){
        $datas = StandarWho::all();
        return response()->json($datas);
    }
}