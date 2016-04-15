<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Desglose extends Model
{
    protected $table = 'desgloses';

	protected $fillable = [
	
	'cod',
	'name'

	];

	protected $guarded = ['id'];
}
