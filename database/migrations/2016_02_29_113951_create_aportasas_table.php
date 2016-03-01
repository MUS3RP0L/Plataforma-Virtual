<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAportasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apor_tasas', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->unsignedInteger('afi_type_id');

            $table->string('mes')->required();
            $table->string('anio')->required();

            $table->double('apor');
            $table->double('apor_fr');
            $table->double('apor_sv');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('afi_type_id')->references('id')->on('afi_types');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apor_tasas');
    }
}
