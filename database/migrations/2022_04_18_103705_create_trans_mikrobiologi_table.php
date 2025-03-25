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
        Schema::create('trans_mikrobiologi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mikrobiologi_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->references('id')
                    ->on('mikrobiologi');;
            $table->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('jenis');
            $table->integer('stok');
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
        Schema::dropIfExists('trans_mikrobiologi');
    }
};
