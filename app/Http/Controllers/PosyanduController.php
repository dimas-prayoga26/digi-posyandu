<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Puskesmas;
use App\Posyandu;
use DB;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    public function posyandu()
    {
        $level = session('level');
        if($level == 'super_admin' || $level == 'bidan' || $level == 'admin_puskesmas'){     
            if (session('level') == 'admin_puskesmas'){
            $datas = DB::table('posyandu')
                    ->join('puskesmas', 'puskesmas.id_puskesmas', '=', 'posyandu.id_puskesmas')
                    ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                    ->select('desa.*', 'puskesmas.*', 'posyandu.*')
                    ->where('puskesmas.id_puskesmas', session('puskesmas'))
                    ->get();
            return view('admin.posyandu.posyandu', compact('datas'))->with('i');
           }elseif(session('level') == 'bidan'){
            $datas = DB::table('posyandu')
                    ->join('puskesmas', 'puskesmas.id_puskesmas', '=', 'posyandu.id_puskesmas')
                    ->join('desa', 'desa.id_desa', '=', 'posyandu.id_desa')
                    ->select('desa.*', 'puskesmas.*', 'posyandu.*')
                    ->where('puskesmas.id_puskesmas', session('posyandu'))
                    ->get();
            return view('admin.posyandu.posyandu', compact('datas'))->with('i');
           }
           else{
           $datas     = Posyandu::all();
           $puskesmas = Puskesmas::all();
           $desa      = Desa::all();
            return view('admin.posyandu.posyandusuperadmin', compact('datas', 'puskesmas', 'desa'))->with('i');
           }
        }else{
            return redirect()->back();
        } 
    }
    public function create(Request $request)
    {
        $request->validate([
            'nama_posyandu' => 'required|string|min:3',
            'id_desa' => 'required',
            'id_puskesmas' => 'required',

        ],
        [
            'nama_posyandu.required'    => 'Nama Posyandu harus diisi',
            'nama_posyandu.min'         => 'Nama Posyandu minimal 3',
            'id_desa.required'          => 'Desa harus diisi',
            'id_puskesmas.required'     => 'Puskesmas harus diisi',
            'max'                       => 'panjang karakter maksimal 100',
        ]);
        $data = $request->only('nama_posyandu','id_desa','id_puskesmas');
        Posyandu::create($data);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_posyandu' => 'required|min:3|string',
            'id_desa' => 'required',
            'id_puskesmas' => 'required',

        ],
        [
            'nama_posyandu.required'    => 'Nama Posyandu harus diisi',
            'nama_posyandu.min'         => 'Nama Posyandu minimal 3',
            'id_desa.required'          => 'Desa harus diisi',
            'id_puskesmas.required'     => 'Puskesmas harus diisi',
            'max'                       => 'panjang karakter maksimal 100',
        ]);

        $data = $request->only('nama_posyandu','id_desa','id_puskesmas');
        Posyandu::whereIdPosyandu($id)->update($data);
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Posyandu::findOrFail($id);

            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');

        // try {
        //     $data->delete();
        //     return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Gagal Dihapus');
        // }
    }
}
