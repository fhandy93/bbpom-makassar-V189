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
        Schema::create('infopom_learning_question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
            ->constrained('infopom_learning_kategori')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('questions');
            $table->string('detail');
            $table->integer('parent_answers_id');
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
        Schema::dropIfExists('infopom_learning_question');
    }
};
