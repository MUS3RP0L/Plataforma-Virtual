<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('cities', function(Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');

        });

        Schema::create('grados', function (Blueprint $table) {
        
            $table->bigIncrements('id');         
            $table->string('niv');
            $table->string('grad');
            $table->string('lit');
            $table->string('abre');

        });

        Schema::create('desgloses', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');         
            $table->integer('cod');
            $table->string('name')->nullable();

        });

        Schema::create('unidades', function (Blueprint $table) { 
            
            $table->bigIncrements('id'); 
            $table->UnsignedBigInteger('desglose_id');
            $table->string('dist');
            $table->string('cod');
            $table->string('lit');
            $table->string('abre');
            $table->foreign('desglose_id')->references('id')->on('desgloses');

        });

        Schema::create('categorias', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->integer('from');
            $table->integer('to');
            $table->double('por');
            $table->string('name');

        });

        Schema::create('state_types', function(Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->string('name');

        });

        Schema::create('afi_states', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('state_type_id');
            $table->string('name');
            $table->foreign('state_type_id')->references('id')->on('state_types');

        }); 

        Schema::create('afi_types', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('afiliados', function (Blueprint $table) {
                        
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afi_type_id')->nullable();
            $table->UnsignedBigInteger('afi_state_id')->nullable();
            $table->UnsignedBigInteger('city_exp_id')->nullable();
            $table->UnsignedBigInteger('city_nat_id')->nullable();
            $table->UnsignedBigInteger('city_dir_id')->nullable();
            $table->UnsignedBigInteger('grado_id')->nullable();
            $table->UnsignedBigInteger('unidad_id')->nullable();
            $table->UnsignedBigInteger('categoria_id')->nullable();
            $table->string('ci')->unique()->required();
            $table->string('matri')->required();
            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();
            $table->string('nom2')->nullable();
            $table->string('ap_esp')->nullable();
            $table->enum('est_civ', ['C', 'S', 'V', 'D'])->nullable();
            $table->enum('sex', ['M', 'F'])->nullable();
            $table->date('fech_nac')->nullable();
            $table->date('fech_ing')->nullable();
            $table->date('fech_dece')->nullable();
            $table->string('motivo_dece')->nullable();
            $table->date('fech_baja')->nullable();
            $table->string('motivo_baja')->nullable();
            $table->date('fech_ini_serv')->nullable();
            $table->date('fech_fin_serv')->nullable();            
            $table->date('fech_est')->nullable();
            $table->string('zona')->nullable();
            $table->string('calle')->nullable();
            $table->string('num_domi')->nullable();
            $table->string('tele')->nullable();
            $table->string('celu')->nullable();
            $table->string('email')->nullable();
            $table->boolean('afp')->nullable();
            $table->bigInteger('nua')->nullable();
            $table->bigInteger('item')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('afi_type_id')->references('id')->on('afi_types');
            $table->foreign('afi_state_id')->references('id')->on('afi_states');
            $table->foreign('city_exp_id')->references('id')->on('cities');
            $table->foreign('city_nat_id')->references('id')->on('cities');
            $table->foreign('city_dir_id')->references('id')->on('cities');
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('unidad_id')->references('id')->on('unidades');
            $table->foreign('categoria_id')->references('id')->on('categorias');

        });

        Schema::create('notes', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('grado_id');
            $table->UnsignedBigInteger('unidad_id');
            $table->UnsignedBigInteger('afi_state_id');
            $table->date('fech');
            $table->integer('type');
            $table->string('message');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); 
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
        Schema::drop('cities');
        Schema::drop('grados');
        Schema::drop('afi_types');
        Schema::drop('afiliados');
        Schema::drop('notes');
        Schema::drop('unidades');
        Schema::drop('categorias');
    }
}
