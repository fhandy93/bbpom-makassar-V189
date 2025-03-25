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
        Schema::create('baku', function (Blueprint $table) {
            $table->id();
            $table->string('no_kontrol');
            $table->string('nama');
            $table->string('bobot');
            $table->tinyInteger('kosmetik')->length(4);
            $table->tinyInteger('pangan')->length(4);
            $table->tinyInteger('ot')->length(4);
            $table->tinyInteger('mikro')->length(4);
            $table->tinyInteger('obat')->length(4);
            $table->tinyInteger('s_kosmetik')->length(4);
            $table->tinyInteger('s_pangan')->length(4);
            $table->tinyInteger('s_ot')->length(4);
            $table->tinyInteger('s_mikro')->length(4);
            $table->tinyInteger('s_obat')->length(4);
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
        Schema::dropIfExists('baku');
    }
};
