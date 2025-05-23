<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void,
     */
    public function up()
    {
        Schema::create('trans_lembur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembur_id');
            $table->string('tgl_lebur',15);
            $table->string('jam_mulai',10);
            $table->string('jam_selesai',10);
            $table->text('ket');
            $table->string('file1');
            $table->string('file2');
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
        Schema::dropIfExists('trans_lembur');
    }
};