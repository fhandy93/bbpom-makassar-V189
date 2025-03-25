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
        Schema::create('sudoku_instrumen_lvl_b', function (Blueprint $table) {
            $table->id();
            $table->string('instrumen_kode', 30);
            $table->string('mutu_kode', 30);
            $table->string('judul_sop');
            $table->string('file');
            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('sudoku_instrumen_lvl_b');
    }
};
