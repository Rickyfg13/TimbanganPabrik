<?php

namespace App\Models;

use App\Models\Timbang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimbangLapangan extends Model
{
    use HasFactory;
    protected $table='table_timbanglapangan';
    protected $primaryKey = 'timbangl_id';
  

    public function truk()
    {
        return $this->belongsTo(Truk::class,'truk_id');
    }
    public function afdeling()
    {
        return $this->belongsTo(Afdeling::class,'afdeling_id');
    }

    public function timbanglapangan()
    {
        return $this->belongsTo(Timbang::class,'timbang_id');
    }

}
