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
        Schema::create('rekap_kualitatif', function (Blueprint $table) {
            $table->id();
            $table->string('bmn',15);
            $table->string('nama',50);
            $table->string('ukuran',20);
            $table->integer('awal')->length(4);
            $table->tinyInteger('pecah')->length(2);
            $table->tinyInteger('masuk')->length(3);
            $table->integer('akhir')->length(4);
            $table->string('bulan',2);
            $table->string('tahun',4);
            $table->string('lab')->length(8);
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
        Schema::dropIfExists('rekap_kualitatif');
    }
};
