<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AportesMuser extends Model
{
    protected $table = 'aportes_musers';

	protected $fillable = [
	
		'afiliado_id',
		'apor_mus_type_id',
		'mes',
		'anio',
	    'fech_apor',
	    'rec',
	    'mus'
		
	];

	protected $guarded = ['id'];
}
