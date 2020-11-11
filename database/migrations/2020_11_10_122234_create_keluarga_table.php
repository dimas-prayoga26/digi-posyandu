<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->string('no_kk',16)->primary();
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_telp', 13);
            $table->enum('status_ekonomi', ['1', '2']);
            $table->text('alamat');
            $table->unsignedInteger('id_desa');
            $table->foreign('id_desa')->references('id_desa')->on('desa');
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
        Schema::dropIfExists('keluarga');
    }
}
