<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gizi', function (Blueprint $table) {
            $table->string('no_pemeriksaan_gizi',11)->primary();
            $table->string('usia');
            $table->float('pb_tb');
            $table->float('bb');
            $table->date('tgl_periksa');
            $table->string('cara_ukur');
            $table->string('asi_eks');
            $table->string('vit_a');
            $table->string('validasi');
            $table->unsignedInteger('id_status_gizi');
            $table->foreign('id_status_gizi')->references('id_status_gizi')->on('status_gizi');
            $table->unsignedInteger('id_anak');
            $table->foreign('id_anak')->references('id_anak')->on('anak');
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
        Schema::dropIfExists('gizi');
    }
}
