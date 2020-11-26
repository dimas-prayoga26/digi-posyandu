<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Puskesmas;
use App\Posyandu;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    public function posyandu()
    {
        $datas     = Posyandu::all();
        $puskesmas = Puskesmas::all();
        $desa      = Desa::all();
        return view('admin.posyandu.posyandu', compact('datas', 'puskesmas', 'desa'))->with('i');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_posyandu' => 'required|string',
            'id_desa' => 'required',
            'id_puskesmas' => 'required',

        ],
        [
            'nama_posyandu.required'    => 'Nama Posyandu harus diisi',
            'id_desa.required'          => 'Desa harus diisi',
            'id_puskesmas.required'     => 'Puskesmas harus diisi',
            'max'                       => 'panjang karakter maksima 100',
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
        $data = $request->only('nama_posyandu','id_desa','id_puskesmas');
        Posyandu::whereIdPosyandu($id)->update($data);
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Posyandu::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
