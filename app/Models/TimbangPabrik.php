<?php

namespace App\Models;

use App\Models\Truk;
use App\Models\Afdeling;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimbangPabrik extends Model
{
    use HasFactory;
    protected $table='table_timbangpabrik';
    protected $primaryKey = 'afdeling_id';
    protected $fillable = [
        
        'timbang_1',
        'timbang_2',
        'timbang_3',
        'total_timbang_pabrik',
    ];

    public function truk()
    {
        return $this->belongsTo(Truk::class,'truk_id');
    }
    public function afdeling()
    {
        return $this->hasOne(Afdeling::class,'afdeling_id');
    }
   

}
