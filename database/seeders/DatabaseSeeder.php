<?php

namespace Database\Seeders;

use App\Models\Truk;
use App\Models\Afdeling;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Truk::create([
            'no_polisi'=> 'BA 8954 AI',
            'jenis_truk'=> 'Colt Diesel PS 120',
            'sopir'=> 'Dhanaoryza Syahputra',
            'status'=> ' Angkutan BBK',
        ]);

        Truk::create([
            'no_polisi'=> ' BA 9901 YC',
            'jenis_truk'=> 'Colt Diesel PS 120',
            'sopir'=> 'Misyadi',
            'status'=> ' Angkutan Pucuk',
        ]);

        Truk::create([
            'no_polisi'=> ' BA 8779 QU             ',
            'jenis_truk'=> 'Isuzu',
            'sopir'=> 'Hendri Naldi Musri',
            'status'=> ' Angkutan Pucuk',
        ]);

        Truk::create([
            'no_polisi'=>'BA 8629 QO',
            'jenis_truk'=> 'Isuzu',
            'sopir'=> 'M. Hazani Irfandy',
            'status'=> ' Angkutan Pucuk',
        ]);

        Truk::create([
            'no_polisi'=> ' BA 8033 BF',
            'jenis_truk'=> ' Toyota Dyna 110 PS',
            'sopir'=> 'Eka Saputra',
            'status'=> ' Angkutan Pucuk',
        ]);

        Truk::create([
            'no_polisi'=> 'BA 9472 AO',
            'jenis_truk'=> 'Isuzu',
            'sopir'=> 'Riki Leksmana',
            'status'=> ' Angkutan Pucuk',
        ]);
        
        Truk::create([
            'no_polisi'=> 'BA 9471 AO',
            'jenis_truk'=> 'Isuzu',
            'sopir'=> 'Ramadhan',
            'status'=> ' Angkutan Pucuk',
        ]);

        Truk::create([
            'no_polisi'=>'BA 9658 QU',
            'jenis_truk'=> 'Isuzu',
            'sopir'=> 'Sumardi',
            'status'=> ' Angkutan Pucuk',
        ]);

        Truk::create([
            'no_polisi'=>' BA 9436 AC',
            'jenis_truk'=> 'Isuzu',
            'sopir'=> 'Indra Chaniago',
            'status'=> ' Angkutan Pucuk',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Afdeling A Barat',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Afdeling A Timur',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Afdeling B Barat',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Afdeling B Timur',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Afdeling C Barat',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Afdeling D',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Afdeling E',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Kelompok Tani Teh GT',
        ]);

        Afdeling::create([
            'nama_afdeling'=> 'Koperasi SJS',
        ]);

    }
}
