<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    protected $table = 'certificaciones';

	protected $fillable = [
	
		'name',
		'fondo_tramite_id',
		'fecha'

	];

	protected $guarded = ['id'];

	public function fondo_tramite(){

        return $this->belongsTo('Muserpol\FondoTramite');
    }

	public function antecedentes(){

        return $this->hasMany('Muserpol\Antecedente');
    }
    
}
