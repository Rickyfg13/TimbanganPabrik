<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Truk;
use App\Models\Timbang;
use App\Models\Afdeling;
use Illuminate\Http\Request;
use App\Charts\TimbangPabrikChart;

class DashboardController extends Controller
{
    public function index(){
        // $data=Timbang::select('timbang_id','tanggal')->get()->groupBy(function($data){
        //     return Carbon::parse($data->tanggal)->format('M');
        // });

        // $months=[];
        // $monthCount=[];

        // foreach($data as $month =>$values){
        //     $months[]=$month;
        //     $monthCount[]=count($values);
        // }
        
        $tanggalAwal =date('Y-m-d',mktime(0,0,0,date('m'),1,date('Y')));
        $tanggalAkhir = date('Y-m-d');
        $tanggal = $tanggalAwal;

        while(strtotime($tanggal)<=strtotime($tanggalAkhir)){
            $labels[]=(int)substr($tanggal,8,2);
            $dataTimbpab[]=Timbang::where('tanggal','like',$tanggal.'%')->sum('berat');
            $tanggal =date('Y-m-d',strtotime("+1 day",strtotime($tanggal)));
        }

        $chart= new TimbangPabrikChart;
        $chart->labels($labels);
        $chart->dataset('Timbang','line',$dataTimbpab)->color('#007bff')->backgroundColor('#17a2b8');    



        $truk=Truk::count();
        $afdel=Afdeling::count();

        $parse['chart']= $chart;
        $parse['tanggalAwal']= $tanggalAwal;
        $parse['tanggalAkhir']= $tanggalAkhir;


        return view('pages.dashboard',compact('truk','afdel','parse'));
    }


    
}