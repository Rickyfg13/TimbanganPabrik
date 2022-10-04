<?php

namespace App\Models;

use App\Models\Truk;
use App\Models\Afdeling;
use App\Models\TimbangLapangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timbang extends Model
{
    use HasFactory;
    protected $table='table_timbang';
    protected $primarykey='timbang_id';
    protected $fillable=[
        'tanggal',
        'jam',
        'timbang_ke',
        'afdeling_id',
        'truk_id',
        'berat',
        'supir',
    ];


    public function afdeling()
    {
        return $this->belongsTo(Afdeling::class,'afdeling_id');
    }

    public function truk()
    {
        return $this->belongsTo(Truk::class,'truk_id');
    }

    public function timbanglapangan()
    {
        return $this->belongsTo(TimbangLapangan::class,'timbangl_id');
    }
}
