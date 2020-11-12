<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function dashboard()
   {
       return view('admin.dashboard');
   }

   public function kader()
   {
       return view('admin.kader');
   }

   public function profil()
   {
       return view('admin.profil');
   }

   public function bidan()
   {
       return view('admin.bidan');
   }

   public function admin()
   {
       return view('admin.admin');
   }

    public function vaksinasi()
   {
       return view('admin.vaksinasi');
   }
   
   public function imunisasi()
   {
       return view('admin.imunisasi');
   }

   public function gizi()
   {
       return view('admin.gizi');
   }

   public function puskesmas()
   {
       return view('admin.puskesmas');
   }

   public function posyandu()
   {
       return view('admin.posyandu');
   }

   public function kartu()
   {
       return view('kartu');
   }

}
