<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function dashboard()
   {
     
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
