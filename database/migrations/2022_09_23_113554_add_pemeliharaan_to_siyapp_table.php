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
        Schema::table('siyapp', function (Blueprint $table) {
              $table->string('pemeliharaan',25)->after('bidang');
              $table->tinyInteger('j_barang')->after('bidang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siyapp', function (Blueprint $table) {
            //
        });
    }
};
