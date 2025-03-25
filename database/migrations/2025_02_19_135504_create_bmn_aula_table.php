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
        Schema::create('bmn_aula', function (Blueprint $table) {
            $table->id();
            $table->string('nm_aula',20);
            $table->string('pj_aula',30);
            $table->string('ukuran',20);
            $table->string('kapasitas',20);
            $table->string('petugas',20);
            $table->string('wa_petugas',20);
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
        Schema::dropIfExists('bmn_aula');
    }
};
