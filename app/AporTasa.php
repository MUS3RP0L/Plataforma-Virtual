<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class AporTasa extends Model
{
    protected $table = 'apor_tasas';

	protected $fillable = [
	
		'afi_type_id',
		'mes',
		'anio',
		'apor',
		'apor_fr',
		'apor_sv'
	];

	protected $guarded = ['id'];
}
