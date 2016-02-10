<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Afiliado extends Model
{
	use SoftDeletes;

    protected $table = 'afiliados';

    protected $dates = ['deleted_at'];

	protected $fillable = [
	
	'ci',
	'pat',
	'mat',
	'nom',
	'nom2',
	'ap_esp',
	'est_civ',
	'sex',
	'matri',
	'fech_nac',
	'fech_ing',
	
	];

	protected $guarded = ['id'];

	public function aportes()
    {
        return $this->hasMany('App\Aporte');
    }

	public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeCiIs($query, $ci)
    {
        return $query->where('ci', $ci);
    }

    public function getFullDateNac()
    {	
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		return date("d", strtotime($this->fech_nac))." de ".$meses[date("n", strtotime($this->fech_nac))-1]. " de ".date("Y", strtotime($this->fech_nac));
 
    }
	
	public function getCivil()
	{
	    if ($this->est_civ == 'S') {
	        return "Soltero";
	    } 
	    else if ($this->est_civ == 'C'){
	        return "Casado";
	    }
	}

	public function getSex()
	{
	    if ($this->sex == 'M') {
	        return "Masculino";
	    } 
	    else if ($this->sex == 'F'){
	        return "Femenino";
	    }
	}

	public function getFullDateIng()
    {	
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		return date("d", strtotime($this->fech_ing))." de ".$meses[date("n", strtotime($this->fech_ing))-1]. " de ".date("Y", strtotime($this->fech_ing));
 
    }
}