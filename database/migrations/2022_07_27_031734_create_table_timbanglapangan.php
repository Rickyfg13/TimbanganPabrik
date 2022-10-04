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
        Schema::create('table_timbanglapangan', function (Blueprint $table) {
            $table->id('timbangl_id');
            $table->date('tanggal');
            $table->time('jam');
            $table->integer('timbang_ke');
            $table->foreignId('afdeling_id');
            $table->string('penimbang');
            $table->integer('berat');
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
        Schema::dropIfExists('table_timbanglapangan');
    }
};
