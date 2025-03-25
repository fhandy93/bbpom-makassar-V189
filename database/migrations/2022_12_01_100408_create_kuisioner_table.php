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
        Schema::create('kuisioner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('nama',50);
            $table->string('usia',10);
            $table->string('jk',12);
            $table->string('hp',12);
            $table->string('p1',20);
            $table->string('p2',20);
            $table->string('instansi',50);
            $table->string('p3',20);
            $table->string('p4',20);
            $table->string('p5',20);
            $table->string('p6',20);
            $table->string('p7',20);
            $table->string('p8',20);
            $table->string('p9',20);
            $table->string('p10',20);
            $table->string('p11',20);
            $table->string('p12',20);
            $table->string('p13',20);
            $table->string('p14',20);
            $table->string('p15',20);
            $table->string('p16',20);
            $table->string('p17',20);
            $table->string('p18',20);
            $table->string('p19',20);
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
        Schema::dropIfExists('kuisioner');
    }
};
