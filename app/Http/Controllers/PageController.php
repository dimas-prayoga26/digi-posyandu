<?php

namespace App\Http\Controllers;
use App\Puskesmas;
use App\Posyandu;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function dashboard()
   {
      $puskes = Puskesmas::count();
      $posyandu = Posyandu::count();  
       return view('admin.dashboard', compact('puskes','posyandu',$puskes,$posyandu));
   }

  

   public function profil()
   {
       return view('admin.profil');
   }

   public function kartu()
   {
       return view('kartu');
   }

}
