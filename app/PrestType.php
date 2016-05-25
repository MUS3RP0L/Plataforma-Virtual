<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class PrestType extends Model
{
    protected $table = 'prest_types';

	protected $fillable = [
	
		'name',
		'sigla'
	];

	protected $guarded = ['id'];
}
