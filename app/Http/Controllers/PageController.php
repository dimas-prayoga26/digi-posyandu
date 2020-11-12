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
   public function kartu()
   {
       return view('kartu');
   }

}
