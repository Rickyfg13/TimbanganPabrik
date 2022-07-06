<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use App\Models\Afdeling;
use Illuminate\Http\Request;
use App\Models\TimbangLapangan;

class TimbangLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=TimbangLapangan::paginate(10);
        return view('pages.timbanglapangan.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $afdeling=Afdeling::all();
        $truk=Truk::all();
        return view('pages.timbanglapangan.tambah',compact('truk','afdeling'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'afdeling_id'=> 'required',
            'truk_id'=> 'required',
            'timbang_1'=> 'required',
            'timbang_2'=> 'required',
            'timbang_3'=> 'required',
            'total_timbang_lapangan'=> 'required',
        ]);

        $timlap = new TimbangLapangan;
       
        $timlap->afdeling_id=$request->afdeling_id;
        $timlap->truk_id=$request->truk_id;
        $timlap->timbang_1=$request->timbang_1;
        $timlap->timbang_2=$request->timbang_2;
        $timlap->timbang_3=$request->timbang_3;
        $timlap->total_timbang_lapangan=$request->total_timbang_lapangan;
        $timlap->save();

        return redirect('timbanglapangan')->with('status','Data Berhasil Ditambahkan');
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
        $afdeling=Afdeling::get();
        $truk=Truk::get();
        $timlap = TimbangLapangan::where('id',$id)->first();
        return view('pages.timbanglapangan.edit',compact('truk','timlap','afdeling'));
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
          
       TimbangLapangan::where('id',$id)->update([
    
        'afdeling_id'=> $request->afdeling_id ,
        'truk_id'=> $request->truk_id ,
        'timbang_1'=>$request->timbang_1,
        'timbang_2'=>$request->timbang_2,
        'timbang_3'=>$request->timbang_3,
        'total_timbang_lapangan'=>$request->total_timbang_lapangan,
    ]);



       return redirect('timbanglapangan')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TimbangLapangan::where('id',$id)->delete();
        return back();
    }
}
