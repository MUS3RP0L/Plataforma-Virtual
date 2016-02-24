<?php

namespace Muserpol;

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
	'fech_ing'
	
	];

	protected $guarded = ['id'];

	public function aportes()
    {
        return $this->hasMany('Muserpol\Aporte');
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
		$meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sept","Oct","Nov","Dic");
		return date("d", strtotime($this->fech_nac))." ".$meses[date("n", strtotime($this->fech_nac))-1]. " ".date("Y", strtotime($this->fech_nac));
 
    }
	
	public function getCivil()
	{
	    if ($this->est_civ == 'S') {
	        
	        if ($this->sex == 'M') {
	        	return "Soltero";
	    	}
	    	else{
	    		return "Soltera";
	    	}
	        
	    } 
	    else if ($this->est_civ == 'C'){
	        if ($this->sex == 'M') {
	        	return "Casado";
	    	}
	    	else{
	    		return "Casada";
	    	}
	    }
	    else if ($this->est_civ == 'V'){
	        if ($this->sex == 'M') {
	        	return "Viudo";
	    	}
	    	else{
	    		return "Viuda";
	    	}
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
		$meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sept","Oct","Nov","Dic");
		return date("d", strtotime($this->fech_ing))." ".$meses[date("n", strtotime($this->fech_ing))-1]. " ".date("Y", strtotime($this->fech_ing));
 
    }
}