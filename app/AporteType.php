<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class AporteType extends Model
{
    protected $table = 'aporte_types';

	protected $fillable = [
	
		'name'
		
	];

	protected $guarded = ['id'];

}
