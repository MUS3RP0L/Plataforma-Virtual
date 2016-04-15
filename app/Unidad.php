<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidad extends Model
{
    protected $table = 'unidades';

	protected $fillable = [
	
	'cod',
	'dist',
	'lit',
	'abre'

	];

	protected $guarded = ['id'];
}
