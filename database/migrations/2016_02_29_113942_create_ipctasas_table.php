<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpctasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipc_tasas', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->string('mes')->required();
            $table->string('anio')->required();

            $table->double('ipc');
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ipc_tasas');
    }
}
