<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    protected $table = 'units';

	protected $fillable = [
	
		'breakdown_id',
		'district',
		'code',
		'name',
		'shortened'

	];

	protected $guarded = ['id'];
}
