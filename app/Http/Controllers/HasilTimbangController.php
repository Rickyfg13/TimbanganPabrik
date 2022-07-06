<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use App\Models\HasilTimbang;
use Illuminate\Http\Request;
use App\Models\TimbangPabrik;
use App\Models\TimbangLapangan;

class HasilTimbangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $truk = Truk::get();
        $timpab = TimbangPabrik::get();
        $timlap = TimbangLapangan::get();
        return view('pages.hasiltimbang.index',compact('timpab','truk','timlap'));
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

    public function periode(Request $request){
        $tanggal_awal = date('Y-m-d',strtotime($request->tanggal_awal));
        $tanggal_akhir = date('Y-m-d',strtotime($request->tanggal_akhir));
 
        $title = "list laporan dari tanggal $tanggal_awal sampai tanggal $tanggal_akhir";
        $data = HasilTimbang::where('created_at','>=',$tanggal_awal.' 00:00:00')->where('created_at','<=',$tanggal_akhir. '23:59:59')->get();
        // dd($data);
        return view('laporan.index',compact('title','data'));
    }

}
