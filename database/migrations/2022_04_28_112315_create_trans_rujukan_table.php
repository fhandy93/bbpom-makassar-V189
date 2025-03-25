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
        Schema::create('trans_rujukan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rujukan_id')
                    ->constrained('rujukan')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->nullable(true);
            $table->text('desc');
            $table->date('tgl_kembali');
            $table->tinyInteger('bidang');
            $table->string('gambar1')->nullable(true);
            $table->string('gambar2')->nullable(true);
            $table->string('gambar3')->nullable(true);
            $table->string('gambar4')->nullable(true);
            $table->string('gambar5')->nullable(true);
            $table->string('gambar6')->nullable(true);
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
        Schema::dropIfExists('trans_rujukan');
    }
};
