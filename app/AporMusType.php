<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class AporMusType extends Model
{
    protected $table = 'apor_mus_types';

	protected $fillable = [
	
		'name'
		
	];

	protected $guarded = ['id'];

 	public function aportes_muser()
    {
        return $this->belongsTo('Muserpol\AportesMuser');
    }
}
