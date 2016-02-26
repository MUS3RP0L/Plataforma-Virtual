<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AfiType extends Model
{
    protected $table = 'afi_types';

	protected $fillable = [
	
		'type',
		'status'
		
	];

	protected $guarded = ['id'];
}
