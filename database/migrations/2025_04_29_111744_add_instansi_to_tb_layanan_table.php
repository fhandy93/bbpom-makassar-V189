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
        Schema::table('tb_layanan', function (Blueprint $table) {
            $table->string('instansi',100)->after('jns_sertifikasi');
            $table->string('kabupaten',30)->after('instansi');
            $table->string('alamat',100)->after('kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_layanan', function (Blueprint $table) {
            //
        });
    }
};
