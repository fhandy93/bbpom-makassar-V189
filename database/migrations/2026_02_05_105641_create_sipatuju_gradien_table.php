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
        Schema::create('sipatuju_gradien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pustaka_id')
            ->constrained('sipatuju_pustaka')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->decimal('waktu',5);
            $table->integer('a');
            $table->integer('b');
            $table->integer('c');
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
        Schema::dropIfExists('sipatuju_gradien');
    }
};
