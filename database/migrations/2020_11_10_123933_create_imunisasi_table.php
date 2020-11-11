<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImunisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imunisasi', function (Blueprint $table) {
            $table->string('no_pemeriksaan_imunisasi',11)->primary();
            $table->date('tgl_imunisasi');
            $table->unsignedInteger('id_vaksinasi');
            $table->foreign('id_vaksinasi')->references('id_vaksinasi')->on('vaksinasi');
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
        Schema::dropIfExists('imunisasi');
    }
}
