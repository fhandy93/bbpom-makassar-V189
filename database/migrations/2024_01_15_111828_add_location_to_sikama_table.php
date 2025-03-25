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
        Schema::table('sikama', function (Blueprint $table) {
             $table->datetime('wktu_kembali')->after('status')->nullable();
             $table->string('lat',12)->after('wktu_kembali')->nullable();
             $table->string('lon',12)->after('wktu_kembali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sikama', function (Blueprint $table) {
            //
        });
    }
};
