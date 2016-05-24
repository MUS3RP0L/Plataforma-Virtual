<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'modalidades';

	protected $fillable = [
	
		'name'
	];

	protected $guarded = ['id'];
}
