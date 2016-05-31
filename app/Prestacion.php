<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    protected $table = 'prestaciones';

	protected $fillable = [
	
		'name',
		'sigla'
	];

	protected $guarded = ['id'];
}
