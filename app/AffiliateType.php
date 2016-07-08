<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateType extends Model
{
    protected $table = 'affiliate_types';

	protected $fillable = [
	
		'name'
		
	];

	protected $guarded = ['id'];
}
