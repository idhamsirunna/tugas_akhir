<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user')->unsigned();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->string('password');
            $table->string('photo');
            $table->tinyInteger('bayar_pendaftaran')->unsigned()->default(0);
            $table->tinyInteger('sudah_cetak')->unsigned()->default(0);
            $table->tinyInteger('is_lulus')->unsigned()->default(0);
            $table->tinyInteger('is_completed')->unsigned()->default(0);
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            // $table->string('jurusan')->unsigned()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
