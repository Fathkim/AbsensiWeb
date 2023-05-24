<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            // key foreign
            $table->integer('id_user')->unsigned();
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_kelas')->unsigned();
            $table->integer('id_jurusan')->unsigned();
            $table->integer('id_mapel')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->integer('id_kaprodi')->unsigned();
            $table->integer('id_absen')->unsigned();
            // relasi foreign key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id')->on('mapel')->onDelete('cascade');
            $table->foreign('id_guru')->references('id')->on('guru')->onDelete('cascade');
            $table->foreign('id_kaprodi')->references('id')->on('kaprodi')->onDelete('cascade');
            $table->foreign('id_absen')->references('id')->on('absen')->onDelete('cascade');
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
        Schema::dropIfExists('profile');
    }
}
