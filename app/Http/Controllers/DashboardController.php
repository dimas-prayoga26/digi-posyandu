<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;
use App\Puskesmas;
use App\Posyandu;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $anak = Anak::count();
        $puskes = Puskesmas::count();
        $posyandu = Posyandu::count();  
        $bidan = User::where('level','bidan')->count();  
        $kader = User::where('level','kader')->count();  
         return view('admin.dashboard', compact('puskes','posyandu','anak','bidan','kader'));
    }
}
