<?php

namespace App\Http\Controllers;
use App\Vaksinasi;

use Illuminate\Http\Request;

class VaksinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
     $datas = Vaksinasi::all();
        return view('admin.vaksinasi.vaksinasi',compact('datas'))->with('i');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
        'nama_vaksinasi'  => 'required|string|min:1|max:15',
            
        ],
        [
                'required'      => 'Data tidak boleh kosong',
                'numeric'       => 'Data harus diisi dengan angka',
                'string'        => 'Data harus diisi dengan huruf',
                'min'           => 'Data kurang dari batas minimum',
                'max'           => 'Data lebih dari batas maksimal',
                      
        ]
    );
        $data = $request->only('nama_vaksinasi');
        Vaksinasi::create($data);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
       /* if($create){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ],200);
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
     {
        $data = $request->only('nama_vaksinasi');
        Vaksinasi::whereIdVaksinasi($id)->update($data);
        return redirect()->back()->with('success', 'Data berhasil  diubah');
    }

     public function delete($id)
    {
        $data = Vaksinasi::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
