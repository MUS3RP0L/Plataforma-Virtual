<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Muserpol\Helper\Util;

class Solicitante extends Model
{
    protected $table = 'solicitantes';

	protected $fillable = [
	    'fondo_tramite_id',
        'soli_type_id',
		'ci',
		'pat',
		'mat',
		'nom',
		'paren',
		'zona_domi',
        'calle_domi',
        'num_domi',
        'tele_domi',
        'celu_domi',
        'zona_trab',
        'calle_trab',
        'num_trab',
		
	];

	protected $guarded = ['id'];

	
    public function soliType()
    {
        return $this->belongsTo('Muserpol\SoliType');
    }

    public function fondo_tramite()
    {
        return $this->belongsTo('Muserpol\FondoTramite');
    }

    public function scopeFonTraIs($query, $id)
    {
        return $query->where('fondo_tramite_id', $id);
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
