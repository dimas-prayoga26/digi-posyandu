<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('username', 100)->unique();
            $table->string('password');
            $table->string('nama');
            $table->enum('jk', ['laki-laki','perempuan']);
            $table->enum('level', ['admin_puskesmas','super_admin']);
            $table->text('alamat');
            $table->unsignedInteger('id_puskesmas')->nullable();
            $table->foreign('id_puskesmas')->references('id_puskesmas')->on('puskesmas');
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
        Schema::dropIfExists('admins');
    }
}
