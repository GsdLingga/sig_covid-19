<?php

namespace App\Http\Controllers;

use App\DataKabupaten;
use App\Kabupaten;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();

        $total_positif = DataKabupaten::select('positif')
        ->where('tanggal', '=', $today)
        ->sum('positif');

        $total_dalam_perawatan = DataKabupaten::select('dalam_perawatan')
        ->where('tanggal', '=', $today)
        ->sum('dalam_perawatan');

        $total_sembuh = DataKabupaten::select('sembuh')
        ->where('tanggal', '=', $today)
        ->sum('sembuh');

        $total_meninggal = DataKabupaten::select('meninggal')
        ->where('tanggal', '=', $today)
        ->sum('meninggal');

        $data_hari_ini = DataKabupaten::select('tb_data.id','nama_kabupaten','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->where('tb_data.tanggal', '=', $today)
        ->orderBy('positif', 'DESC')
        ->get();

        return view('content.dashboard', compact('data_hari_ini','total_positif','total_dalam_perawatan','total_sembuh','total_meninggal',
        'today'));
    }

    public function getDataMap(){
        $tanggal = Carbon::today();;

        $data = DataKabupaten::select('nama_kabupaten','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->rightjoin('tb_kabupaten','tb_data.id_kabupaten','=','tb_kabupaten.id')
        ->where('tb_data.tanggal', $tanggal)
        ->whereNotIn('nama_kabupaten', ['Kabupaten Lainnya','Warga Negara Asing'])
        ->get();
        return $data;
    }

    public function getDataColorMap(){
        $tanggal = Carbon::today();;

        $data = DataKabupaten::select('nama_kabupaten','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->rightjoin('tb_kabupaten','tb_data.id_kabupaten','=','tb_kabupaten.id')
        ->where('tb_data.tanggal', $tanggal)
        ->whereNotIn('nama_kabupaten', ['Kabupaten Lainnya','Warga Negara Asing'])
        ->orderBy('positif','ASC')
        ->get();
        return $data;
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
