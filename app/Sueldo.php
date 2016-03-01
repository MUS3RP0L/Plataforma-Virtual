<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Sueldo extends Model
{
    protected $table = 'sueldos';

	protected $fillable = [
	
		'grado_id',
		'anio',
		'sue'
	];

	protected $guarded = ['id'];
}
