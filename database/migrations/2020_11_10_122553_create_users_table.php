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
            $table->increments('id_user');
            $table->string('name');
            $table->string('username',50)->unique();
            $table->string('password');
            $table->enum('jk', ['laki-laki', 'perempuan']);
            $table->text('alamat');
            $table->enum('level', ['kader', 'bidan']);
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
        Schema::dropIfExists('users');
    }
}
