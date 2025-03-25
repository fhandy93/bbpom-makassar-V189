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
        Schema::create('rekap_mikrobiologi', function (Blueprint $table) {
            $table->id();
            $table->string('kataloq',20);
            $table->string('nama',100);
            $table->string('netto',30);
            $table->string('exp',30);
            $table->integer('stok')->length(5);
            $table->string('bulan',2);
            $table->string('tahun',4);
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
        Schema::dropIfExists('rekap_mikrobiologi');
    }
};
