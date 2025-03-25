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
        Schema::create('sudoku_smap_lvl_a', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('lvl');
            $table->string('klausul',5);
            $table->string('no_dokumen',30);
            $table->string('judul');
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
        Schema::dropIfExists('sudoku_smap_lvl_a');
    }
};
