<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aportes', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('afiliado_id')->unsigned();
            $table->timestamps();
            $table->string('mes');
            $table->string('anio');

            $table->string('item');
            $table->string('cat');
            $table->string('ant');

            $table->double('sue');
            $table->double('b_est');
            $table->double('b_car');
            $table->double('b_fron');
            $table->double('b_ori');
            $table->double('seg');
            $table->double('dfu');

            $table->string('nat');
            $table->string('lac');
            $table->string('pre');
            $table->string('sub');

            $table->double('gan');
            $table->double('cot');
            $table->double('cot_adi');
            $table->double('mus');

        });
        
        Schema::table('aportes', function($table) {
        
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aportes');
    }
}
