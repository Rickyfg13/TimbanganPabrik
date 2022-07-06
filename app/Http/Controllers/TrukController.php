<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use App\Models\JenisTruk;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TrukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_truk=Truk::paginate(10);
        return view('pages.truk.tampil',compact('list_truk'));
    }

   

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

        $truk = Truk::create($request->all());
        return redirect('truk')->with('status','Data Berhasil Ditambahkan');

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
        $truk = Truk::where('truk_id',$id)->first();
        return view('pages.truk.edit',compact('truk'));
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
        $request->validate([
            'no_polisi'=> 'required',
            'id_jenistruk'=> 'required',
            'sopir'=> 'required',
            'status'=> 'required',
           
        ]);

        $truk = Truk::where('truk_id',$id)->first();
        $truk->no_polisi=$request->no_polisi;
        $truk->nama_truk=$request->nama_truk;
        $truk->save();



       return redirect('truk')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Truk::where('truk_id',$id)->delete();
        return back();
    }
}
