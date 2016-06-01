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
        Schema::create('roles', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('rol_id');

            $table->string('ape');
            $table->string('nom');
            $table->string('tel')->nullable();
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->enum('status',['Activo', 'Inactivo'])->default('Activo');
            $table->rememberToken();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rol_id')->references('id')->on('roles');

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
