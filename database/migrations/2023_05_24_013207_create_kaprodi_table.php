<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaprodiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaprodi', function (Blueprint $table) {
            $table->increment('id');
            $table->integer('id_jurusan')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_jurusan')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
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
        Schema::dropIfExists('kaprodi');
    }
}
