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
        Schema::create('ulpk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('umur')->default('-');
            $table->string('kelamin')->default('-');
            $table->string('alamat');
            $table->string('hp')->default('-');
            $table->string('email')->default('-');
            $table->string('perusahaan')->default('-');
            $table->string('pekerjaan')->default('-');
            $table->string('jenis');
            $table->text('layanan');
            $table->text('jawaban');
            $table->string('komoditi');
            $table->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('petugas')->default('-');
            $table->string('sarana');
            $table->boolean('rujuk');
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
        Schema::dropIfExists('ulpk');
    }
};
