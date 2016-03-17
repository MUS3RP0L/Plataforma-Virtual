<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('user_id');

            $table->UnsignedBigInteger('aporte_id');
            $table->UnsignedBigInteger('pago_id');
            $table->UnsignedBigInteger('note_id');
            $table->UnsignedBigInteger('titular_id');
            $table->UnsignedBigInteger('ipc_tasa_id');
            $table->UnsignedBigInteger('apor_tasa_id');
            $table->UnsignedBigInteger('sueldo_id');
            $table->text('message');
            $table->integer('activity_type_id');
            
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
        Schema::drop('activities');
    }
}
