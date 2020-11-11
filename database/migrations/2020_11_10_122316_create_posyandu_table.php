<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosyanduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posyandu', function (Blueprint $table) {
            $table->increments('id_posyandu');
            $table->string('nama_posyandu');
            $table->unsignedInteger('id_desa');
            $table->foreign('id_desa')->references('id_desa')->on('desa');
            $table->unsignedInteger('id_puskesmas');
            $table->foreign('id_puskesmas')->references('id_puskesmas')->on('puskesmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posyandu');
    }
}
