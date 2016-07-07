<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('contribution_payments', function(Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('affiliate_id');
            $table->enum('type',['normal', 'reimbursements'])->default('normal');
            $table->date('payment_date')->nullable();
            $table->string('code'); 
            $table->double('quotable');
            $table->double('retirement_fund');
            $table->double('mortuary_quota');
            $table->double('mortuary_aid');
            $table->double('subtotal');
            $table->double('ipc');
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('affiliate_id')->references('id')->on('affiliates');

        });

        Schema::create('contribution_types', function(Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');
            
        }); 

        Schema::create('contributions', function (Blueprint $table) {
                        
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('affiliate_id');
            $table->UnsignedBigInteger('contribution_type_id');
            $table->UnsignedBigInteger('contribution_payment_id')->nullable();
            $table->UnsignedBigInteger('degree_id')->nullable();
            $table->UnsignedBigInteger('unit_id')->nullable();
            $table->UnsignedBigInteger('category_id')->nullable();
            $table->date('month_year')->required();
            $table->string('item')->nullable();
            $table->double('base_wage');
            $table->double('seniority_bonus');
            $table->double('dignity_pension');
            $table->double('study_bonus');
            $table->double('position_bonus');
            $table->double('border_bonus');
            $table->double('east_bonus');
            $table->double('public_security_bonus')->nullable();
            $table->string('deceased')->nullable();
            $table->string('natality')->nullable();
            $table->string('lactation')->nullable();
            $table->string('prenatal')->nullable();
            $table->double('subsidy')->nullable();
            $table->double('gain');
            $table->double('payable_liquid');
            $table->double('quotable');
            $table->double('retirement_fund');
            $table->double('mortuary_quota');
            $table->double('mortuary_aid');
            $table->double('subtotal')->nullable();
            $table->double('ipc')->nullable();
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            $table->foreign('contribution_type_id')->references('id')->on('contribution_types');
            $table->foreign('contribution_payment_id')->references('id')->on('contribution_payments');
            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unique(array('afiliado_id','month_year'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contributions');
    }
}
