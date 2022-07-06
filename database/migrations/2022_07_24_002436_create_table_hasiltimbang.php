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
        Schema::create('table_hasiltimbang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('afdeling_id');
            $table->foreignId('truk_id');
            $table->foreignId('timlap_id')->references('id')->on('table_timbanglapangan');
            $table->foreignId('timpab_id')->references('id')->on('table_timbangpabrik');
            $table->integer('selisih_timbang');
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
        Schema::dropIfExists('table_timbanganpabrik');
    }
};
