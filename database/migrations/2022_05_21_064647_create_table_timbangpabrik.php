<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_timbangpabrik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('afdeling_id');
            $table->foreignId('truk_id');
            $table->integer('timbang_1')->nullable();
            $table->integer('timbang_2')->nullable();
            $table->integer('timbang_3')->nullable();
            $table->integer('total_timbang_pabrik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_timbangpabrik');
    }
};
