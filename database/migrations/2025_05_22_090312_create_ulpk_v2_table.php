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
        Schema::create('ulpk_v2', function (Blueprint $table) {
            $table->id();
             $table->string('nama',100);
            $table->string('umur',12)->default('-');
            $table->string('kelamin',10)->default('-');
            $table->string('alamat',200);
            $table->string('hp',15)->default('-');
            $table->string('email',100)->default('-');
            $table->string('perusahaan',200)->default('-');
            $table->string('pekerjaan',30)->default('-');
            $table->string('jenis',20);
            $table->text('layanan');
            $table->text('jawaban');
            $table->string('komoditi',20);
            $table->foreignId('petugas1_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('petugas2_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('sarana',15);
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
        Schema::dropIfExists('ulpk_v2');
    }
};
