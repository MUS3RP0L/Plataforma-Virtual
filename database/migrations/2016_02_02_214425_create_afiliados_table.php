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
            
            $table->increments('id');
            $table->string('name');
            $table->string('cod');
        }); 

        Schema::create('afi_types', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('type');
            $table->string('status');
        }); 

        Schema::create('afiliados', function (Blueprint $table)
         {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');  

            $table->unsignedInteger('afi_type_id')->nullable();

            $table->unsignedInteger('depa_exp_id')->nullable();
            $table->unsignedInteger('depa_nat_id')->nullable();
            $table->unsignedInteger('depa_rad_id')->nullable();

            $table->string('ci')->unique()->required();
            $table->string('matri')->unique()->required();

            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();
            $table->string('nom2')->nullable();
            $table->string('ap_esp')->nullable();

            $table->string('exp')->nullable();

            $table->enum('est_civ', ['C', 'S', 'V', 'D'])->nullable();

            $table->enum('sex', ['M', 'F'])->nullable();

            $table->date('fech_nac')->nullable();
            $table->date('fech_ing')->nullable();
            $table->date('fech_dece')->nullable();

            $table->string('zona')->nullable();
            $table->string('calle')->nullable();
            $table->string('num_domi')->nullable();
            $table->string('tele')->nullable();
            $table->string('celu')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('afi_type_id')->references('id')->on('afi_types');
            $table->foreign('depa_exp_id')->references('id')->on('departamentos');
            $table->foreign('depa_nat_id')->references('id')->on('departamentos');
            $table->foreign('depa_rad_id')->references('id')->on('departamentos');

        });

        Schema::create('notes', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('afiliado_id')->unsigned();
            $table->string('type');
            $table->string('obs');

            $table->timestamps();
            $table->softDeletes();

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
