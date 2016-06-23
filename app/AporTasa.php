<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class AporTasa extends Model
{
    protected $table = 'apor_tasas';

	protected $fillable = [
	
		'afi_type_id',
		'gest',
        'apor_a',
        'apor_fr_a',
        'apor_sv_a',
        'apor_am_p'
	];

	protected $guarded = ['id'];
}
