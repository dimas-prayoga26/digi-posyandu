<?php

namespace App\Http\Controllers;
use App\Puskesmas;

use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    public function puskesmas()
   {
    //
   }

    public function index()
    {
        $datas = Puskesmas::all();
        return view('admin.puskesmas.puskesmas',compact('datas'))->with('i');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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

        $data = $request->only('nama_puskesmas','alamat');
        Puskesmas::whereIdPuskesmas($id)->update($data);
        return redirect()->back()->with('success', 'Data berhasil  diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

            return redirect()->back()->with('error', 'Data gagal dihapus');
}

            return redirect()->back()->with('success', 'Data gagal dihapus');
        }
    }