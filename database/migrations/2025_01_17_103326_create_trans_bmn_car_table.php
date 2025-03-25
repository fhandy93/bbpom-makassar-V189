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
        Schema::create('trans_bmn_car', function (Blueprint $table) {
            $table->id();
               $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_input')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('car_id')
            ->constrained('bmn_car')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('driver_id')
            ->constrained('bmn_driver')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamp('wkt_pinjam')->nullable();
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
        Schema::dropIfExists('trans_bmn_car');
    }
};
