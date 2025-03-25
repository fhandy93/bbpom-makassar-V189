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
        Schema::create('siyapp', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama_barang');
            $table->string('merek');
            $table->string('type');
            $table->string('nup');
            $table->string('tahun');
            $table->string('bidang');
            $table->string('sifat');
            $table->string('jenis');
            $table->string('tindak_awal');
            $table->string('tindak_lanjut');
            $table->string('uji');
            $table->string('tgl_selesai');
            $table->string('ket');
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
        Schema::dropIfExists('siyapp');
    }
};
