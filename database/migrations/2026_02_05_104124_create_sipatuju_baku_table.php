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
        Schema::create('sipatuju_baku', function (Blueprint $table) {
            $table->id();
             $table->foreignId('uji_id')
            ->constrained('sipatuju_zat_uji')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('no_kontrol',20);
            $table->string('baku',60);
            $table->decimal('kadar',7);
            $table->decimal('susut',7);
            $table->decimal('koreksi',7);
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
        Schema::dropIfExists('sipatuju_baku');
    }
};
