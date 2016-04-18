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

    public function getDataEdit()
    {	
		if ($this->fech_dece) {
		return date("d", strtotime($this->fech_dece))."/".date("m", strtotime($this->fech_dece)). "/".date("Y", strtotime($this->fech_dece));
 		}
    }

    public function getFullDateNac()
    {	
		$meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
		if ($this->fech_dece) {
			return date("d", strtotime($this->fech_dece))." ".$meses[date("n", strtotime($this->fech_dece))-1]. " ".date("Y", strtotime($this->fech_dece));
		}
    }
}
