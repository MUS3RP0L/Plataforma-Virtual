<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class SoliType extends Model
{
    protected $table = 'soli_types';

	protected $fillable = [
	
		'name'
		
	];

	protected $guarded = ['id'];
 
}
