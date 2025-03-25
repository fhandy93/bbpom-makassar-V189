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
        Schema::create('tb_layanan', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('no_antrian');
            $table->string('jns_layanan');
            $table->string('nama');
            $table->string('umur');
            $table->string('kelamin');
            $table->string('hp');
            $table->string('email');
            $table->string('pekerjaan');
            $table->string('jns_sertifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_layanan');
    }
};
