<?php

namespace App\Models;

use App\Models\TimbangPabrik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Afdeling extends Model
{
    use HasFactory;
    protected $table='table_afdeling';
    protected $fillable = [
        'nama_afdeling',
    ];

    
    public function timbangpabrik()
    {
        return $this->belongsTo(TimbangPabrik::class);
    }
}



