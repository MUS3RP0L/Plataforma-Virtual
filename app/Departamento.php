<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    protected $table = 'departamentos';

	protected $fillable = [
	
		'name',
		'cod'
	
	];

	protected $guarded = ['id'];
}