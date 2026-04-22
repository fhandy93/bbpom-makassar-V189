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
        Schema::create('sipatuju_lod_loq', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uji_id')
            ->constrained('sipatuju_zat_uji')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('kategori',20);
            $table->decimal('lod',10);
            $table->decimal('loq',10);
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
        Schema::dropIfExists('sipatuju_lod_loq');
    }
};
