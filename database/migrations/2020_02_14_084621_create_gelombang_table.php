<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGelombangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gelombang', function (Blueprint $table) {
            $table->increments('id_gelombang');
            $table->string('nama_bank');
            $table->string('no_rek');
            $table->string('pemilik_rek');
            $table->string('cp_smp');
            $table->string('cp_sma');
            $table->string('cp_smk');
            $table->integer('active');
            $table->string('alamat_sekolah');
            $table->string('telp_sekolah');
            $table->string('nama_gelombang');
            $table->date('tgl_ujian');
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
        Schema::dropIfExists('gelombang');
    }
}
