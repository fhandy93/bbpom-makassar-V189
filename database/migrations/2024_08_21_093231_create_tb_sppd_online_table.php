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
        Schema::create('tb_sppd_online', function (Blueprint $table) {
            $table->id();
               $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_data')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->tinyInteger('level_biaya')->default(0);
            $table->text('maksud');
            $table->string('transport',20);
            $table->string('asal',25);
            $table->string('tujuan',25);
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->string('akun',35);
            $table->string('keterangan',35);
            $table->date('tgl');
            $table->tinyInteger('ppk')->default(0);
            $table->tinyInteger('mengetahui')->default(0);
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
        Schema::dropIfExists('tb_sppd_online');
    }
};
