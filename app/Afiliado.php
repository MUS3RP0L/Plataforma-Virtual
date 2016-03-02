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
	'matri',
	'pat',
	'mat',
	'nom',
	'nom2',
	'ap_esp',
	'est_civ',
	'sex',
	'fech_nac',
	'fech_ing',
	'fech_dece',
	'zona',
	'calle',
	'num_domi',
	'tele',
	'celu',
	'email'

	];

	protected $guarded = ['id'];

	public function aportes()
    {
        return $this->hasMany('Muserpol\Aporte');
    }

    public function aportes_musers()
    {
        return $this->hasMany('Muserpol\AportesMuser');
    }    

    public function notes()
    {
        return $this->hasMany('Muserpol\Note');
    }

    public function titular()
    {
        return $this->hasOne('Muserpol\Titular');
    }

    public function user()
    {
        return $this->belongsTo('Muserpol\User');
    }

    public function afi_state()
    {
        return $this->belongsTo('Muserpol\AfiState');
    }

    public function municipio()
    {
        return $this->belongsTo('Muserpol\Municipio');
    }

    public function departamento()
    {
        return $this->belongsTo('Muserpol\Departamento');
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
	    else if ($this->est_civ == 'D'){
	        if ($this->sex == 'M') {
	        	return "divorciado";
	    	}
	    	else{
	    		return "divorciada";
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
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		return date("d", strtotime($this->fech_ing))." ".$meses[date("n", strtotime($this->fech_ing))-1]. " ".date("Y", strtotime($this->fech_ing));
 
    }
}