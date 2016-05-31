<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Muserpol\Helper\Util;

class Solicitante extends Model
{
    protected $table = 'solicitantes';

	protected $fillable = [
	
		'ci',
		'pat',
		'mat',
		'nom',
		'nom2',
		'fech_nac'
		
	];

	protected $guarded = ['id'];

	public function afiliado()
    {
        return $this->belongsTo('Muserpol\Afiliado');
    }

    public function soliType()
    {
        return $this->belongsTo('Muserpol\SoliType');
    }

    public function getFullNametoPrint()
    {
        return $this->nom . ' ' . $this->pat. ' ' . $this->mat;
    }

    public function getParentesco()
    {
        if ($this->soliType->id == 3) {
            return $this->paren;
        }else{
            return $this->soliType->name;
        }
    }

    public function getFullDateNactoPrint()
    {   
        return Util::getfulldate($this->fech_nac);
    }

    public function getFullDireccDomitoPrint()
    {
        return $this->calle_domi . ' ' . $this->num_domi . ' ' . $this->zona_domi;
    }

    public function getFullDireccTrabtoPrint()
    {
        return $this->calle_trab . ' ' . $this->num_trab . ' ' . $this->zona_trab;
    }

    public function getFullNumber()
    {
        return $this->tele_domi . ' ' . $this->celu_domi;
    }
}
