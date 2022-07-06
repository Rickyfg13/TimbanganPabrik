<?php

namespace App\Models;

use App\Models\TimbangPabrik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Truk extends Model
{
    use HasFactory;
    protected $table='table_truk';
    protected $primaryKey = "truk_id";
    protected $fillable = [
        'no_polisi',
        'nama_truk',
        'jenis_truk',
        'sopir',
        'status',
    ];  
}
   