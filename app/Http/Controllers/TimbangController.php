<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use App\Models\Timbang;
use App\Models\Afdeling;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Models\TimbangLapangan;
use Illuminate\Support\Facades\DB;


class TimbangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listi=Timbang::with('afdeling','truk','timbanglapangan')->paginate(10);
        return view('pages.timbang.index',compact('listi'));
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
        $timbangl=TimbangLapangan::all();
        return view('pages.timbang.tambah',compact('truk','afdeling','timbangl'));
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
            'tanggal'=> 'required',
            'jam'=> 'required',
            'timbang_ke'=> 'required',
            'afdeling_id'=> 'required',
            'truk_id'=> 'required',
            'berat'=> 'required',
            'supir'=> 'required',
            'timbangl_id'=> 'required',
        ]);

        $timbang = new Timbang;
       
        $timbang->tanggal=$request->tanggal;
        $timbang->jam=$request->jam;
        $timbang->timbang_ke=$request->timbang_ke;
        $timbang->afdeling_id=$request->afdeling_id;
        $timbang->truk_id=$request->truk_id;
        $timbang->berat=$request->berat;
        $timbang->supir=$request->supir;
        $timbang->timbangl_id=$request->timbangl_id;
        $timbang->save();

        return redirect('timbang')->with('status','Data Berhasil Ditambahkan');

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
        $timbang = Timbang::where('timbang_id',$id)->first();
        return view('pages.timbang.edit',compact('truk','timbang','afdeling'));
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
        Timbang::where('timbang_id',$id)->update([
    
            'tanggal'=>$request->tanggal,
            'jam'=>$request->jam,
            'timbang_ke'=>$request->timbang_ke,
            'afdeling_id'=> $request->afdeling_id ,
            'truk_id'=> $request->truk_id ,
           
            'berat'=>$request->berat,
            'supir'=>$request->supir,

        ]);
    
           return redirect('timbangpabrik')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($timbang_id)
    {
        Timbang::where('timbang_id',$timbang_id)->delete();
        return back();
    }

    public function cetakForm(){
        
        $listi=Timbang::with('afdeling','truk','timbanglapangan')->paginate(10);
        return view('pages.timbang.cetak',compact('listi'));
    }


    public function filterTgl(Request $request )
    {

        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        // $listi = DB::table('table_timbang')
        // ->join('table_timbanglapangan', 'table_timbang.timbang_id', 'table_timbanglapangan.timbangl_id')
        // ->select('table_timbanglapangan.*', 'table_timbang.*')
        // ->whereBetween('table_timbang.tanggal', [$dari, $sampai])
        // ->get();

        $listi=Timbang::with('afdeling','truk','timbanglapangan')
        ->whereBetween('tanggal',[$dari,$sampai])
        ->paginate(10);


        return view('pages.timbang.cetak',compact('listi'));
    }

    public function printSelisihTimbang()

    {
       
        $listi=Timbang::with('afdeling','truk','timbanglapangan')
        ->get();

        $pdf = PDF::loadview('pages.timbang.selisih_pdf',['listi'=>$listi]);
        return $pdf->stream('laporan-selisih-timbang.pdf');
    }

    // public function pdf($timbang_id)
    // {
    //     $pdf = \App::make('dompdf.wrapper')->setPaper('A4','vertical');
    //     $pdf->loadHTML($this->convert_member_to_html($timbang_id));
    //     return $pdf->stream();
    // }

    // public function convert_member_to_html($timbang_id)
    // {
    //     $selisihTimbang = $this->tampil($timbang_id);
    //     $random;
    //     $output = 
    //     '<img src="assets/img/Agam.png" style="position: absolute; width: 80px; height: auto;">
    //     <h4 style="text-align : center">Surat Izin Membangun Bangunan</h1>
    //     <h4 style="text-align : center">Izin Bupati Agam</h3>
    //       <h4 style="text-align : center">Jl. Sudirman No. 1 Lubuk Basung, Kabupaten Agam, Sumatera Barat</h4>
    //         <hr>
    //       <br>
         
    //       <br>
    //       <br>';
        
         
    //      $output.= '
    //      <div>
    //           <table class="table table-bordered" border="1" width="100%" >
    //             <tbody>
    //                 <tr>
    //                   <th style="text-align : left">Nomor</th>
    //                   <td>'.$selisihTimbang->timbang_id.'</td>
    //                 </tr>
    //                 <tr>
    //                   <th style="text-align : left">Tanggal</th>
    //                   <td>'.$selisihTimbang->afdeling->nama_afdeling.'</td>
    //                 </tr>
    //                 <tr>
    //                   <th style="text-align : left">Atas Nama</th>
    //                   <td>'.$selisihTimbang->timbang_ke.'</td>
    //                 </tr>
    //                 <tr>
    //                 <th style="text-align : left">Jenis Bangunan</th>
    //                 <td>'.$selisihTimbang->berat.'</td>
    //               </tr>
    //               <tr>
    //                 <th style="text-align : left">Panjang</th>
    //                 <td>'.$selisihTimbang->timbanglapangan->berat.'</td>
    //               </tr>
    //               <tr>
    //               <th style="text-align : left">Lebar</th>
    //               <td>'.$selisihTimbang->abs($item->berat-$item->timbanglapangan->berat).'</td>
    //             </tr>
                 
    //             </tbody>
    //           </table>
    //     </div>
          

    //       <br><br><br>
    //       <h6 align="right">Mengetahui</h6>
    //       <h6 align="right">Bupati Agam</h6>
    //        <br><br>
    //       <h6 align="right">Andri Warman</h6>
    //       <h6 align="right"></h6>';

          
        
    

        
    //     return $output;
             
    // }

}