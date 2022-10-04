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
        Schema::create('table_timbang', function (Blueprint $table) {
            $table->id('timbang_id');
            $table->date('tanggal');
            $table->time('jam');
            $table->integer('timbang_ke');
            $table->foreignId('afdeling_id');
            $table->foreignId('truk_id');   
            $table->integer('berat');
            $table->string('supir',40);
            $table->foreignId('timbangl_id');
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
        Schema::dropIfExists('table_timbang');
    }
};
