<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->increments('id_anak');
            $table->string('nik', 16)->nullable();
            $table->string('nama_anak');
            $table->date('tgl_lahir');
            $table->enum('jk',['laki-laki', 'perempuan']);
            $table->string('anak_ke');
            $table->string('bb_lahir');
            $table->string('pb_lahir');
            $table->string('kia');
            $table->string('imd');
            $table->string('no_kk', 16)->index();
            $table->foreign('no_kk')->references('no_kk')->on('keluarga');
            $table->unsignedInteger('id_posyandu');
            $table->foreign('id_posyandu')->references('id_posyandu')->on('posyandu');
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
        Schema::dropIfExists('anak');
    }
}
