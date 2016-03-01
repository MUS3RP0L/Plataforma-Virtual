<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

	protected $fillable = [
	
		'name',
		'cod'
	
	];

	protected $guarded = ['id'];

	public function municipios()
    {
        return $this->hasMany('Muserpol\Municipio');
    }
}