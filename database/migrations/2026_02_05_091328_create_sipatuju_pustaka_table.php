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
        Schema::create('sipatuju_pustaka', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uji_id')
            ->constrained('sipatuju_zat_uji')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('pustaka',40);
            $table->string('pelarut',20);
            $table->string('jns_kolom',40);
            $table->decimal('ukuran',4);
            $table->string('panjang_diameter',16);
            $table->string('panjang_gel',10);
            $table->string('detector',10);
            $table->string('fase_gerak');
            $table->string('laju_air',17);
            $table->string('pengencer',7);
            $table->decimal('berat_atom',7);
            $table->decimal('berat_molekul',7);
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
        Schema::dropIfExists('sipatuju_pustaka');
    }
};
