<?php

namespace App\Models;

use App\Models\Truk;
use App\Models\TimbangPabrik;
use App\Models\TimbangLapangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilTimbang extends Model
{
    use HasFactory;
     protected $table='table_hasiltimbang';


    public function truk()
    {
        return $this->belongsTo(Truk::class);
    }

     public function timlap()
     {
         return $this->belongsTo(TimbangLapangan::class,'timlap_id');
     }

     public function timpab()
     {
         return $this->belongsTo(TimbangPabrik::class,'timpab_id');
     }

}
