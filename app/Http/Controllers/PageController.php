<?php

namespace App\Http\Controllers;
use App\Admin;
use DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function profil()
   {
    $datas = Admin::get();
    // dd($datas);
    return view('admin.profil', compact('datas'));
   }

   public function update(Request $request, $id)
   {
       $request->validate([
           'username'      => 'required|min:3|string|max:100', 
           'password'      => 'required|string|min:5',
           'nama'          => 'required|string',
           'alamat'        => 'required|string',
           'jk'            => 'required'
       ],
       [
           'username.required'         => 'Username harus diisi',
           'username.min'              => 'Username minimal 3',
           'nama.required'             => 'Nama harus diisi',
           'alamat.required'           => 'Alamat harus diisi',
           'password.required'         => 'Password harus diisi', 
           'jk.required'               => 'Jenis Kelamin harus diisi',
           'max'                       => 'panjang karakter maksima 100',
       ]);
       $datas = $request->only('nama','jk','alamat');
       Admin::whereIdAdmin($id)->update($datas);
       return redirect()->back()->with('success', 'Data berhasil diubah');
   }
   public function kartu() 
   {
       return view('kartu');
   }

}
