<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $table = 'requisitos';

	protected $fillable = [
	
		'name'
	];

	protected $guarded = ['id'];
}
