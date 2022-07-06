<?php

namespace App\Http\Controllers;
use App\Models\Afdeling;
use Illuminate\Http\Request;
use Session;

class AfdelingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_afdeling=Afdeling::paginate(10);
        return view('pages.afdeling.index',compact('list_afdeling'));
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
        $afdeling = Afdeling::create($request->all());
        return redirect('afdeling')->with('status','Data Berhasil Ditambahkan');
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
        $afdeling = Afdeling::where('afdeling_id',$id)->first();
        return view('pages.afdeling.edit',compact('afdeling'));
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
        Afdeling::where('afdeling_id',$id)->update([
            'nama_afdeling'=> $request->nama_afdeling,
        ]);
        return redirect('afdeling')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Afdeling::where('afdeling_id',$id)->delete();
        return back();
    }
}
