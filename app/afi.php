<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Afi extends Model
{
	protected $fillable = [
	
		'id',
		'carpeta',
		'nombres',
		'grado',
	];
}