<?php

namespace App\Http\Controllers;
use App\Gizi;
use App\Anak;
use App\StatusGizi;
use App\Keluarga;
use DB;
use Illuminate\Http\Request;
use App\Exports\GiziExport;
use App\Exports\GiziCollectExport;
use Maatwebsite\Excel\Facades\Excel;

class GiziController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        /* $datas = DB::table('gizi')
            ->join('status_gizi', 'gizi.id_status_gizi', '=', 'status_gizi.id_status_gizi')
            ->join('anak', 'gizi.id_anak', '=', 'anak.id_anak')
            ->select('gizi.*', 'status_gizi.*', 'anak.*')
            ->get(); */
        $datas = Gizi::all();
        return view('admin.gizi.gizi', compact('datas'));
    }

    public function export_gizi(){
        
        return Excel::download(new GiziExport, 'gizi.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
