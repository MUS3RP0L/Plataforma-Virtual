<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class FondoTramite extends Model
{
    protected $table = 'fondo_tramites';

	protected $fillable = [
		
		'afiliado_id',
		'modalidad_id',
		'name',
		
	];

	protected $guarded = ['id'];

	public function afiliado(){

        return $this->belongsTo('Muserpol\Afiliado');
    }

	public function modalidad(){

        return $this->belongsTo('Muserpol\Modalidad');
    }

    public function documentos(){

        return $this->hasMany('Muserpol\Documento');
    }

    public function recepciones(){

        return $this->hasMany('Muserpol\Recepcion');
    }

}
