<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_survey', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('tb_layanan');
            $table->foreignId('petugas_id')->constrained('tb_petugas');
            $table->tinyInteger('skala_survey');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_survey');
    }
};
