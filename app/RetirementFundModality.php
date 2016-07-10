<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class RetirementFundModality extends Model
{
    protected $table = 'retirement_fund_modalities';

	protected $fillable = [
	
		'name',
		'shortened'
	];

	protected $guarded = ['id'];

}
