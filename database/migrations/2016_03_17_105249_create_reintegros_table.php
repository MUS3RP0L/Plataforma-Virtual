<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReintegrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reintegros', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('pago_id')->nullable();

            $table->date('gest')->required();


            $table->string('cat');
            
            $table->double('sue');
            $table->double('b_ant');
            $table->double('rent_dig');
            $table->double('b_est');
            $table->double('b_car');
            $table->double('b_fro');
            $table->double('b_ori');

            $table->double('gan');
            $table->double('pag');

            $table->double('cot');
            $table->double('mus');
            $table->double('fr');
            $table->double('sv');
            $table->double('ipc')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('pago_id')->references('id')->on('pagos');

            $table->unique(array('afiliado_id','gest'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reintegros');
    }
}
