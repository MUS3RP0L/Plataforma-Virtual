<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

	protected $fillable = [
	
		'depa_id',
		'name'
	
	];

	protected $guarded = ['id'];

	public function departamento(){

        return $this->belongsTo('Muserpol\Departamento');
    }
}
