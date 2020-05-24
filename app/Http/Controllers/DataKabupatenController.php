<?php

namespace App\Http\Controllers;

use App\DataKabupaten;
use App\Kabupaten;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataKabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggal = Carbon::today()->format('Y-m-d');

        $badung = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Badung')->paginate(5);
        // ->get();

        $bangli = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Bangli')->paginate(5);
        // ->get();

        $buleleng = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Buleleng')->paginate(5);
        // ->get();

        $denpasar = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Denpasar')->paginate(5);
        // ->get();

        $gianyar = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Gianyar')->paginate(5);
        // ->get();

        $jembrana = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Jembrana')->paginate(5);
        // ->get();

        $karangasem = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Karangasem')->paginate(5);
        // ->get();

        $klungkung = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Klungkung')->paginate(5);
        // ->get();

        $tabanan = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Tabanan')->paginate(5);
        // ->get();

        $kabupaten_lain = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Kabupaten Lainnya')->paginate(5);
        // ->get();

        $wna = DataKabupaten::select('tb_data.id','positif','dalam_perawatan','sembuh','meninggal','tanggal')
        ->join('tb_kabupaten', 'tb_data.id_kabupaten', '=', 'tb_kabupaten.id')
        ->orderBy('tanggal', 'DESC')
        ->where('nama_kabupaten', '=', 'Warga Negara Asing')->paginate(5);
        // ->get();

        $cek_data_hari_ini = DataKabupaten::select('id')
        ->where('tanggal', $tanggal)
        ->count();
        
        return view('content.datakabupaten', compact('badung','bangli','buleleng','denpasar','gianyar','jembrana'
        ,'karangasem','klungkung','tabanan','kabupaten_lain','wna','cek_data_hari_ini'));
    }

    // public function copyData(){
    //     $yesterday = Carbon::today()->subDays(1)->format('Y-m-d');
    //     $today = Carbon::today()->format('Y-m-d');

    //     $data = DataKabupaten::select('id_kabupaten','positif','dalam_perawatan','sembuh','meninggal')
    //     ->rightjoin('tb_kabupaten','tb_data.id_kabupaten','=','tb_kabupaten.id')
    //     ->where('tb_data.tanggal', $yesterday)
    //     ->get();

    //     foreach ($data as $data_copy) {
    //         $copy_data = new DataKabupaten;
    //         $copy_data->id_kabupaten = $data_copy->id_kabupaten;
    //         $copy_data->positif = $data_copy->positif;
    //         $copy_data->dalam_perawatan = $data_copy->dalam_perawatan;
    //         $copy_data->sembuh = $data_copy->sembuh;
    //         $copy_data->meninggal = $data_copy->meninggal;
    //         $copy_data->tanggal = $today;
    //         $copy_data->save();
    //     }

    //     redirect()->action('DataKabupatenController@index')->with("success", "Berhasil Edit Data");
    //     // return $copy_data;
    // }

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
        $yesterday = Carbon::today()->subDays(1)->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');

        $data = DataKabupaten::select('id_kabupaten','positif','dalam_perawatan','sembuh','meninggal')
        ->rightjoin('tb_kabupaten','tb_data.id_kabupaten','=','tb_kabupaten.id')
        ->where('tb_data.tanggal', $yesterday)
        ->get();

        foreach ($data as $data_copy) {
            $copy_data = new DataKabupaten;
            $copy_data->id_kabupaten = $data_copy->id_kabupaten;
            $copy_data->positif = $data_copy->positif;
            $copy_data->dalam_perawatan = $data_copy->dalam_perawatan;
            $copy_data->sembuh = $data_copy->sembuh;
            $copy_data->meninggal = $data_copy->meninggal;
            $copy_data->tanggal = $today;
            $copy_data->save();
        }

        return redirect()->action('DataKabupatenController@index')->with('success', 'Berhasil Edit Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataKabupaten  $dataKabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(DataKabupaten $dataKabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataKabupaten  $dataKabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table_id = DataKabupaten::find($id);

        return view('content.editdata', compact('table_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataKabupaten  $dataKabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table_id = DataKabupaten::find($id);
        $table_id->positif = $request->positif;
        $table_id->dalam_perawatan = $request->dalam_perawatan;
        $table_id->sembuh = $request->sembuh;
        $table_id->meninggal = $request->meninggal;
        $table_id->save();

        return redirect()->action('DataKabupatenController@index')->with("success", "Berhasil Edit Data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataKabupaten  $dataKabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKabupaten $dataKabupaten)
    {
        //
    }
}
