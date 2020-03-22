<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ortu', function (Blueprint $table) {
            $table->integer('id_ortu')->primary();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat_ayah');
            $table->string('alamat_ibu');
            $table->string('telp_ayah');
            $table->string('telp_ibu');
            $table->string('pendidikan_ayah');
            $table->string('pendidikan_ibu');
            $table->string('penghasilan_ayah');
            $table->string('penghasilan_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
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
        Schema::dropIfExists('detail_ortu');
    }
}
