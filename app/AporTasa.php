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
        'apor_a',
        'apor_fr_a',
        'apor_sv_a',
        'apor_p',
        'apor_fr_p',
        'apor_sv_p'
	];

	protected $guarded = ['id'];
}
