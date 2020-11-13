<?php

namespace App\Http\Controllers;

use App\Puskesmas;
use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    public function puskesmas()
    {
       return view('admin.puskesmas.puskesmas');
    }

    public function create(Request $request)
    {
        Puskesmas::create($request->only('nama_puskesmas', 'alamat'));
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Puskesmas::where('id_puskesmas', $id)
            ->update($request->only('nama_puskesmas', 'alamat'));
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = Puskesmas::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', 'Data gagal dihapus');
        }
    }
}
