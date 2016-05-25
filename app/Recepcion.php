<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = 'recepciones';

	protected $fillable = [
		
		'fondo_tramite_id',
		'destino_id',
		'fech_entrega'
	];

	protected $guarded = ['id'];

	public function fondo_tramite(){

        return $this->belongsTo('Muserpol\FondoTramite');
    }
}
