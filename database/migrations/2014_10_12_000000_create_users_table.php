<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->bigIncrements('id');
            $table->string('ape');
            $table->string('nom');
            $table->string('tel')->nullable();
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->enum('role',['admin', 'fondo_retiro', 'complemento']);
            $table->enum('status',['Activo', 'Inactivo'])->default('Activo');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
