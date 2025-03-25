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
        Schema::create('tb_sppd_online_pengikut_ex', function (Blueprint $table) {
            $table->id();
             $table->foreignId('sppd_id')
            ->constrained('tb_sppd_online_ex')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nama1',50);
            $table->string('tgl1',30);
            $table->string('ket1',100);
            $table->string('nama2',50);
            $table->string('tgl2',30);
            $table->string('ket2',100);
            $table->string('nama3',50);
            $table->string('tgl3',30);
            $table->string('ket3',100);
            $table->string('nama4',50);
            $table->string('tgl4',30);
            $table->string('ket4',100);
            $table->string('nama5',50);
            $table->string('tgl5',30);
            $table->string('ket5',100);
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
        Schema::dropIfExists('tb_sppd_online_pengikut_ex');
    }
};
