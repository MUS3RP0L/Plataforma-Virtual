<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Conyuge extends Model
{
    protected $table = 'conyuges';

	protected $fillable = [
	
		'ci',
		'pat',
		'mat',
		'nom',
		'nom2',
		'fech_dece',
		'motivo_dece'		
	];

	protected $guarded = ['id'];

	public function afiliado()
    {
        return $this->belongsTo('App\Afiliado');
    }
}
