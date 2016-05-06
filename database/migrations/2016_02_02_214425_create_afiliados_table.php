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
        Schema::create('departamentos', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cod');

            $table->timestamps();

        });

        Schema::create('afi_types', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('afi_states', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('afi_type_id');
            $table->string('name');

            $table->timestamps();

            $table->foreign('afi_type_id')->references('id')->on('afi_types');

        }); 

        Schema::create('afiliados', function (Blueprint $table)
         {
            
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afi_state_id')->nullable();

            $table->UnsignedBigInteger('depa_exp_id')->nullable();
            $table->UnsignedBigInteger('depa_nat_id')->nullable();
            $table->UnsignedBigInteger('depa_dir_id')->nullable();

            $table->string('ci')->unique()->required();
            $table->string('matri')->required();

            $table->date('fech_lastg')->nullable();

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

            $table->date('fech_ini_anti')->nullable();
            $table->date('fech_fin_anti')->nullable();

            $table->date('fech_ini_reco')->nullable();
            $table->date('fech_fin_reco')->nullable();

            $table->date('fech_est')->nullable();
            $table->date('fech_gra')->nullable();
            $table->date('fech_uni')->nullable();

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
            $table->foreign('afi_state_id')->references('id')->on('afi_states');

            $table->foreign('depa_exp_id')->references('id')->on('departamentos');
            $table->foreign('depa_nat_id')->references('id')->on('departamentos');
            $table->foreign('depa_dir_id')->references('id')->on('departamentos');
        });

        Schema::create('notes', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

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
        Schema::drop('departamentos');
        Schema::drop('afi_types');
        Schema::drop('afiliados');
        Schema::drop('notes');
        
    }
}
