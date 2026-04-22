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
        Schema::create('sipatuju_alat_lab', function (Blueprint $table) {
            $table->id();
            $table->string('merek', 15);
            $table->string('tipe_seri',40);
            $table->string('detector',15);
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
        Schema::dropIfExists('sipatuju_alat_lab');
    }
};
