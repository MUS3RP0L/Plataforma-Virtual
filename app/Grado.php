<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    protected $table = 'grados';

	protected $fillable = [
	
	'niv',
	'grad',
	'lit',
	'abre',
	
	];

	protected $guarded = ['id'];
}