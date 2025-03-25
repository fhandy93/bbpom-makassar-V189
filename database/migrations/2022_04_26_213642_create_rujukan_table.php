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
        Schema::create('rujukan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_terima');
            $table->string('nama',30);
            $table->string('ttl',50);
            $table->string('umur',10);
            $table->string('kelamin',10);
            $table->string('agama',10);
            $table->string('pekerjaan',50);
            $table->string('alamat',100);
            $table->string('hp',15);
            $table->string('fax',50);
            $table->string('email',50);
            $table->string('pengaduan',10);
            $table->string('produk',50);
            $table->string('regis',20);
            $table->string('batch',20);
            $table->string('kadaluarsa',30);
            $table->string('pabrik',50);
            $table->string('alm_pab',100);
            $table->string('nama_kor',20);
            $table->string('alm_kor',50);
            $table->string('kelamin_kor',10);
            $table->text('desc');
            $table->tinyInteger('tindak');
            $table->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('tujuan',100);
            $table->text('hal');
            $table->text('ket');
            $table->string('gambar1')->nullable(true);
            $table->string('gambar2')->nullable(true);
            $table->string('gambar3')->nullable(true);
            $table->string('gambar4')->nullable(true);
            $table->string('gambar5')->nullable(true);
            $table->string('gambar6')->nullable(true);
            $table->tinyInteger('status')->default(0);
            $table->text('kembali')->nullable(true);
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
        Schema::dropIfExists('rujukan');
    }
};
