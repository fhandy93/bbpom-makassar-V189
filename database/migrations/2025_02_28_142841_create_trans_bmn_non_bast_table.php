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
        Schema::create('trans_bmn_non_bast', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nonbast_id')
            ->constrained('bmn_non_bast')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('barang_id')
            ->constrained('bmn_barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('trans_bmn_non_bast');
    }
};
