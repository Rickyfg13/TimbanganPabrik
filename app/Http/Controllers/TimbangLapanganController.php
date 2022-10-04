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
        $listi=TimbangLapangan::with('truk','afdeling')->paginate(10);
        return view('pages.timbanglapangan.index',compact('listi'));
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
           
            'tanggal'=>'required',
            'jam'=>'required',
            'timbang_ke'=> 'required',
            'afdeling_id'=> 'required',
            'penimbang'=> 'required',
            'berat'=> 'required',
            
        ]);

        $timbang = new TimbangLapangan;
       
        $timbang->tanggal=$request->tanggal;
        $timbang->jam=$request->jam;
        $timbang->timbang_ke=$request->timbang_ke;
        $timbang->afdeling_id=$request->afdeling_id;
        $timbang->penimbang=$request->penimbang;
        $timbang->berat=$request->berat;
        $timbang->save();

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
       
        $timbang = TimbangLapangan::where('timbangl_id',$id)->first();
        return view('pages.timbanglapangan.edit',compact('timbang','afdeling'));
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
        TimbangLapangan::where('timbangl_id',$id)->update([
    
            'tanggal'=>$request->tanggal,
            'jam'=>$request->jam,
            'timbang_ke'=>$request->timbang_ke,
            'afdeling_id'=> $request->afdeling_id ,
            'berat'=>$request->berat,
            'penimbang'=>$request->penimbang,

        ]);
    
           return redirect('timbanglapangan')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($timbangl_id)
    {
        TimbangLapangan::where('timbangl_id',$timbangl_id)->delete();
        return back();
    }

   
}
