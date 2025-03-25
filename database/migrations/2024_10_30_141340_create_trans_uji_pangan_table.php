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
        Schema::create('trans_uji_pangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_id')
                    ->constrained('uji_pangan_sub_kategory')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->nullable(true);
            $table->foreignId('parameter_id')
                    ->constrained('uji_pangan_parameter')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->nullable(true);
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
        Schema::dropIfExists('trans_uji_pangan');
    }
};
