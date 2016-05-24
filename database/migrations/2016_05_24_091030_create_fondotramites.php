<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFondotramites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('modalidades', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('fondo_tramites', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');   
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('modalidad_id');
      
            $table->string('name');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('modalidad_id')->references('id')->on('modalidades');

        });

        Schema::create('requisitos', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');         
            $table->string('name');
            
            $table->timestamps();
        });

        Schema::create('documentos', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id'); 
            $table->UnsignedBigInteger('requisito_id');
            
            $table->date('fech_pres');
            $table->enum('est_civ', ['P', 'O', 'R']);
            $table->string('obs')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('requisito_id')->references('id')->on('requisitos');        

        });

        Schema::create('recepciones', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');  
            $table->UnsignedBigInteger('fondo_tramite_id');
       
            $table->string('destino_id');

            $table->date('fech_entrega');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
