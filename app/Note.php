<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

	protected $fillable = [
	
		'afiliado_id',
		'type',
		'obs',

	];

	protected $guarded = ['id'];
}
