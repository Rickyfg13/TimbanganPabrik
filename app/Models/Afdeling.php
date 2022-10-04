<?php

namespace App\Models;

use App\Models\Timbang;
use App\Models\Afdeling;
use App\Models\TimbangLapangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Afdeling extends Model
{
    use HasFactory;
    protected $table='table_afdeling';
    protected $primaryKey = "afdeling_id";
    protected $fillable = [
        'nama_afdeling',
    ];

    
    public function timbang()
    {
        return $this->hasMany(Timbang::class,'timbang_id');
    }

    public function timlap()
    {
        return $this->hasMany(TimbangLapangan::class,'timbangl_id');
    }
}



