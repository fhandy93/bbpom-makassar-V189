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
        Schema::create('infopom_faq_qna', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
            ->constrained('infopom_faq_kategori')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('tanya');
            $table->string('jawab');
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
        Schema::dropIfExists('infopom_faq_qna');
    }
};
