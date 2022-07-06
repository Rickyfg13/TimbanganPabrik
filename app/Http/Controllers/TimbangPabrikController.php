<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use App\Models\Afdeling;
use Illuminate\Http\Request;
use App\Models\TimbangPabrik;

class TimbangPabrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
        $list=TimbangPabrik::paginate(10);
        return view('pages.timbangpabrik.index',compact('list'));
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
        return view('pages.timbangpabrik.tambah',compact('truk','afdeling'));
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
            'total_timbang_pabrik'=> 'required',
        ]);

        $timpam = new TimbangPabrik;
       
        $timpam->afdeling_id=$request->afdeling_id;
        $timpam->truk_id=$request->truk_id;
        $timpam->timbang_1=$request->timbang_1;
        $timpam->timbang_2=$request->timbang_2;
        $timpam->timbang_3=$request->timbang_3;
        $timpam->total_timbang_pabrik=$request->total_timbang_pabrik;
        $timpam->save();

        return redirect('timbangpabrik')->with('status','Data Berhasil Ditambahkan');
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
        $timpam = TimbangPabrik::where('id',$id)->first();
        return view('pages.timbangpabrik.edit',compact('truk','timpam','afdeling'));
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
        
        
       TimbangPabrik::where('id',$id)->update([
        'afdeling_id'=> $request->afdeling_id ,
        'truk_id'=> $request->truk_id ,
        'timbang_1'=>$request->timbang_1,
        'timbang_2'=>$request->timbang_2,
        'timbang_3'=>$request->timbang_3,
        'total_timbang_pabrik'=>$request->total_timbang_pabrik,
    ]);



       return redirect('timbangpabrik')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TimbangPabrik::where('id',$id)->delete();
        return back();
    }
}
