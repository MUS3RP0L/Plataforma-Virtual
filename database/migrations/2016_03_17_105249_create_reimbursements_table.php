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
        Schema::create('reimbursements', function (Blueprint $table) {
                        
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('affiliate_id');
            $table->UnsignedBigInteger('contribution_payment_id')->nullable();
            $table->UnsignedBigInteger('category_id')->nullable();
            $table->date('month_year')->required();
            $table->double('base_wage');
            $table->double('seniority_bonus');
            $table->double('dignity_pension');
            $table->double('study_bonus');
            $table->double('position_bonus');
            $table->double('border_bonus');
            $table->double('east_bonus');
            $table->double('public_security_bonus')->nullable();
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
            $table->foreign('affiliate_id')->references('id')->on('afiliados');
            $table->foreign('contribution_payment_id')->references('id')->on('contribution_payments');
            $table->unique(array('affiliate_id','gest'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reimbursements');
    }
}
