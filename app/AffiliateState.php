<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateState extends Model
{
    protected $table = 'affiliate_states';

	protected $fillable = [
	
		'name'
	
	];

	protected $guarded = ['id'];

    public function state_type()
    {
    	return $this->belongsTo('Muserpol\StateType');
    }
}
