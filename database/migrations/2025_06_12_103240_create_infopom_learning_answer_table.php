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
        Schema::create('infopom_learning_answer', function (Blueprint $table) {
            $table->id();
             $table->foreignId('questions_id')
            ->constrained('infopom_learning_question')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('answers');
            $table->string('detail');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('infopom_learning_answer');
    }
};
