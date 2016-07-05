<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class ContributionRate extends Model
{
    protected $table = 'contribution_rates';

	protected $fillable = [
	
		'month_year',
		'retirement_fund',
        'life_insurance',
        'rate_active',
        'rate_passive'
	];

	protected $guarded = ['id'];
}
