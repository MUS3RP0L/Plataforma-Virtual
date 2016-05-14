<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Muserpol\Helper\Util;

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

    public function conyuge()
    {
        return $this->hasOne('Muserpol\Conyuge');
    }

    public function user()
    {
        return $this->belongsTo('Muserpol\User');
    }

    public function grado(){

        return $this->belongsTo('Muserpol\Grado');
    }

    public function unidad(){

        return $this->belongsTo('Muserpol\Unidad');
    }

    public function afi_state()
    {
        return $this->belongsTo('Muserpol\AfiState');
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
        return Util::getdateabre($this->fech_nac);
    }

    public function getFullDateIng()
    {   
        return Util::getdateabre($this->fech_ing);
    }

    public function getFull_fech_dece()
    {   
        return Util::getdateabre($this->fech_dece);
    }

    public function getFull_fech_ini_apor()
    {   
        return Util::getdateabreperiod($this->fech_ini_apor);
    }
    public function getFull_fech_fin_apor()
    {   
        return Util::getdateabreperiod($this->fech_fin_apor);
    }
    public function getYearsAndMonths_fech_ini_apor()
    {
        return Util::getYearsAndMonths($this->fech_ini_apor, $this->fech_fin_apor);
    }

    public function getFull_fech_ini_serv()
    {   
        return Util::getdateabreperiod($this->fech_ini_serv);
    }
    public function getFull_fech_fin_serv()
    {   
        return Util::getdateabreperiod($this->fech_fin_serv);
    }
    public function getYearsAndMonths_fech_fin_serv()
    {
        return Util::getYearsAndMonths($this->fech_ini_serv, $this->fech_fin_serv);
    }

    public function getFull_fech_ini_anti()
    {   
        return Util::getdateabreperiod($this->fech_ini_anti);
    }
    public function getFull_fech_fin_anti()
    {   
        return Util::getdateabreperiod($this->fech_fin_anti);
    }
    public function getYearsAndMonths_fech_ini_anti()
    {
        return Util::getYearsAndMonths($this->fech_ini_anti, $this->fech_fin_anti);
    }

    public function getFull_fech_ini_reco()
    {   
        return Util::getdateabreperiod($this->fech_ini_reco);
    }
    public function getFull_fech_fin_reco()
    {   
        return Util::getdateabreperiod($this->fech_fin_reco);
    }
    public function getYearsAndMonths_fech_ini_reco()
    {
        return Util::getYearsAndMonths($this->fech_ini_reco, $this->fech_fin_reco);
    }

    public function getHowOld()
    {
    	if ($this->fech_dece) {
    		return Util::getHowOldF($this->fech_nac, $this->fech_dece) . " AÑOS";
    	}
    	else{
    		return Carbon::parse($this->fech_nac)->age . " AÑOS";
    	}	
    }
	
	public function getCivil()
	{
	    if ($this->est_civ == 'S') {
	        
	        if ($this->sex == 'M') {
	        	return "SOLTERO";
	    	}
	    	else{
	    		return "SOLTERA";
	    	}	      
	    } 
	    else if ($this->est_civ == 'C'){
	        if ($this->sex == 'M') {
	        	return "CASADO";
	    	}
	    	else{
	    		return "CASADA";
	    	}
	    }
	    else if ($this->est_civ == 'V'){
	        if ($this->sex == 'M') {
	        	return "VIUDO";
	    	}
	    	else{
	    		return "VIUDA";
	    	}
	    }
	    else if ($this->est_civ == 'D'){
	        if ($this->sex == 'M') {
	        	return "DIVORCIADO";
	    	}
	    	else{
	    		return "DIVORCIADA";
	    	}
	    }
	}

	public function getSex()
	{
	    if ($this->sex == 'M') {
	        return "MASCULINO";
	    } 
	    else if ($this->sex == 'F'){
	        return "FEMENINO";
	    }
	}

    public function getDataEdit()
    {	
        return Util::getdateforEdit($this->fech_nac);
    }

    public function getDataEditEst()
    {	
        return Util::getdateforEdit($this->fech_est);
    }

    public function getData_fech_baja()
    {   
        return Util::getdateforEdit($this->fech_baja);
    }

    public function getData_fech_dece()
    {   
        return Util::getdateforEdit($this->fech_dece);
    }

    public function getDataEditGra()
    {	
        return Util::getdateforEdit($this->fech_gra);
    }

    public function getData_fech_ini_apor()
    {	
        return Util::getdateforEditPeriod($this->fech_ini_apor);
    }
    public function getData_fech_fin_apor()
    {	
        return Util::getdateforEditPeriod($this->fech_fin_apor);
	}

    public function getData_fech_ini_serv()
    {	
        return Util::getdateforEditPeriod($this->fech_ini_serv);
    }

    public function getData_fech_fin_serv()
    {	
        return Util::getdateforEditPeriod($this->fech_fin_serv);
    }

    public function getData_fech_ini_anti()
    {	
    	return Util::getdateforEditPeriod($this->fech_ini_anti);
    }
    public function getData_fech_fin_anti()
    {	
        return Util::getdateforEditPeriod($this->fech_fin_anti);
    }

    public function getData_fech_ini_reco()
    {	
    	return Util::getdateforEditPeriod($this->fech_ini_reco);
    }
    public function getData_fech_fin_reco()
    {	
    	return Util::getdateforEditPeriod($this->fech_fin_reco);
   	}

	public function getFullName()
    {
        return $this->grado->lit . ' ' . $this->pat . ' ' . $this->mat. ' ' . $this->nom;
    }

    public function getTittleName()
    {
        return Util::ucw($this->nom) . ' ' . Util::ucw($this->nom2)  . ' ' . Util::ucw($this->pat) . ' ' . Util::ucw($this->mat) . ' ' . Util::ucw($this->ap_esp);
    }

    public function getFullNametoPrint()
    {
        return $this->nom . ' ' . $this->nom2 . ' ' . $this->pat. ' ' . $this->mat;
    }

    public function getFullDirecctoPrint()
    {
        return $this->calle . ' ' . $this->num_domi . ' ' . $this->zona. ' ' . $this->depa_dir;
    }

    public function getFullDateNactoPrint()
    {   
        return Util::getfulldate($this->fech_nac);
    }
    
    public function getFull_fech_decetoPrint()
    {   
        return Util::getfulldate($this->fech_dece);
    }

    public function getFullDateIngtoPrint()
    {   
        return Util::getfulldate($this->fech_ing);
    }
    public function getFull_fech_fin_aportoPrint()
    {   
        return Util::getfulldate($this->fech_fin_apor);
    }
    public function getData_fech_bajatoPrint()
    {   
        return Util::getfulldate($this->fech_baja);
    }

    public function getData_fech_ini_Reco_print()
    {   
        if ($this->fech_ini_reco) {
            return $this->fech_ini_reco;
        }else{
            return $this->fech_ing;
        }
    }
    public function getData_fech_fin_Reco_print()
    {   
        if ($this->fech_fin_reco) {
            return $this->fech_fin_reco;
        }else{
            $lastAporte = Aporte::afiliadoId($this->id)->orderBy('gest', 'desc')->first();
            return $lastAporte->gest;
        }
    }

}

Afiliado::updating(function($afiliado)
{
	Activity::updateAfiliado($afiliado);
	Note::updateAfiliado($afiliado);
});

Afiliado::created(function($afiliado)
{
	Note::createAfiliado($afiliado);
});
