<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->belongsTo('Muserpol\FrCalificacion');
    }

    public function getFullNametoPrint()
    {
        return $this->nom . ' ' . $this->pat. ' ' . $this->mat;
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
