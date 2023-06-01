<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kelas')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('alamat')->nullable();
            $table->integer('no_hp')->nullable();
            $table->integer('nis')->nullable();
            $table->integer('nisn')->nullable();
            $table->string('photo')->nullable();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('siswa');
    }
}

