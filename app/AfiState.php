<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AfiState extends Model
{
        protected $table = 'afi_states';

	protected $fillable = [
	
		'name'
	
	];

	protected $guarded = ['id'];
}
