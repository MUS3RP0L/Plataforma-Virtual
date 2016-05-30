<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class DictamenLegal extends Model
{
    protected $table = 'dictamen_legales';

	protected $fillable = [
		
		'fondo_tramite_id',
		'cite',
		'obs',
		
	];

	protected $guarded = ['id'];

	public function fondo_tramite(){

        return $this->belongsTo('Muserpol\FondoTramite');
    }
}
