<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
		if ($this->fech_nac) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
		  return date("d", strtotime($this->fech_nac))." ".$meses[date("n", strtotime($this->fech_nac))-1]. " ".date("Y", strtotime($this->fech_nac));
        }
    }

    public function getFull_fech_dece()
    {   
        if ($this->fech_dece) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_dece))." ".$meses[date("n", strtotime($this->fech_dece))-1]. " ".date("Y", strtotime($this->fech_dece)); 
        }
    }

    public function getFull_fech_ini_apor()
    {   
        if ($this->fech_ini_apor) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_ini_apor))." ".$meses[date("n", strtotime($this->fech_ini_apor))-1]. " ".date("Y", strtotime($this->fech_ini_apor)); 
        }
    }
    public function getFull_fech_fin_apor()
    {   
        if ($this->fech_fin_apor) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_fin_apor))." ".$meses[date("n", strtotime($this->fech_fin_apor))-1]. " ".date("Y", strtotime($this->fech_fin_apor));
        }
    }
    public function getYearsAndMonths_fech_ini_apor()
    {
        $fech_ini_apor = Carbon::create(date("Y", strtotime($this->fech_ini_apor)), date("m", strtotime($this->fech_ini_apor)), 1);
        $fech_fin_apor = Carbon::create(date("Y", strtotime($this->fech_fin_apor)), date("m", strtotime($this->fech_fin_apor)), 1);
        $years = $fech_ini_apor->diffInYears($fech_fin_apor);
        $totalmonths = $years*12;
        $months = $fech_ini_apor->diffInMonths($fech_fin_apor) - $totalmonths + 1;
        return $years . " Años " . $months . " Meses";
    }

    public function getFull_fech_ini_serv()
    {   
        if ($this->fech_ini_serv) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_ini_serv))." ".$meses[date("n", strtotime($this->fech_ini_serv))-1]. " ".date("Y", strtotime($this->fech_ini_serv)); 
        }
    }
    public function getFull_fech_fin_serv()
    {   
        if ($this->fech_fin_serv) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_fin_serv))." ".$meses[date("n", strtotime($this->fech_fin_serv))-1]. " ".date("Y", strtotime($this->fech_fin_serv));
        }
    }
    public function getYearsAndMonths_fech_fin_serv()
    {
        $fech_ini_serv = Carbon::create(date("Y", strtotime($this->fech_ini_serv)), date("m", strtotime($this->fech_ini_serv)), 1);
        $fech_fin_serv = Carbon::create(date("Y", strtotime($this->fech_fin_serv)), date("m", strtotime($this->fech_fin_serv)), 1);
        $years = $fech_ini_serv->diffInYears($fech_fin_serv);
        $totalmonths = $years*12;
        $months = $fech_ini_serv->diffInMonths($fech_fin_serv) - $totalmonths + 1;
        return $years . " Años " . $months . " Meses";
    }

    public function getFull_fech_ini_anti()
    {   
        if ($this->fech_ini_anti) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_ini_anti))." ".$meses[date("n", strtotime($this->fech_ini_anti))-1]. " ".date("Y", strtotime($this->fech_ini_anti)); 
        }
    }
    public function getFull_fech_fin_anti()
    {   
        if ($this->fech_fin_anti) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_fin_anti))." ".$meses[date("n", strtotime($this->fech_fin_anti))-1]. " ".date("Y", strtotime($this->fech_fin_anti));
        }
    }
    public function getYearsAndMonths_fech_ini_anti()
    {
        $fech_ini_anti = Carbon::create(date("Y", strtotime($this->fech_ini_anti)), date("m", strtotime($this->fech_ini_anti)), 1);
        $fech_fin_anti = Carbon::create(date("Y", strtotime($this->fech_fin_anti)), date("m", strtotime($this->fech_fin_anti)), 1);
        $years = $fech_ini_anti->diffInYears($fech_fin_anti);
        $totalmonths = $years*12;
        $months = $fech_ini_anti->diffInMonths($fech_fin_anti) - $totalmonths + 1;
        return $years . " Años " . $months . " Meses";
    }

    public function getFull_fech_ini_reco()
    {   
        if ($this->fech_ini_reco) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_ini_reco))." ".$meses[date("n", strtotime($this->fech_ini_reco))-1]. " ".date("Y", strtotime($this->fech_ini_reco)); 
        }
    }
    public function getFull_fech_fin_reco()
    {   
        if ($this->fech_fin_reco) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
            return date("d", strtotime($this->fech_fin_reco))." ".$meses[date("n", strtotime($this->fech_fin_reco))-1]. " ".date("Y", strtotime($this->fech_fin_reco));
        }
    }
    public function getYearsAndMonths_fech_ini_reco()
    {
        $fech_ini_reco = Carbon::create(date("Y", strtotime($this->fech_ini_reco)), date("m", strtotime($this->fech_ini_reco)), 1);
        $fech_fin_reco = Carbon::create(date("Y", strtotime($this->fech_fin_reco)), date("m", strtotime($this->fech_fin_reco)), 1);
        $years = $fech_ini_reco->diffInYears($fech_fin_reco);
        $totalmonths = $years*12;
        $months = $fech_ini_reco->diffInMonths($fech_fin_reco) - $totalmonths + 1;
        return $years . " Años " . $months . " Meses";
    }

    public function getHowOld()
    {
    	if ($this->fech_dece) {
    		return "-";
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

	public function getFullDateIng()
    {	
		if ($this->fech_ing) {
            $meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
            return date("d", strtotime($this->fech_ing))." ".$meses[date("m", strtotime($this->fech_ing))-1]. " ".date("Y", strtotime($this->fech_ing));
        }
    }

    public function getDataEdit()
    {	
        if ($this->fech_nac) {
		  return date("d", strtotime($this->fech_nac))."/".date("m", strtotime($this->fech_nac)). "/".date("Y", strtotime($this->fech_nac));
        }
    }

    public function getDataEditEst()
    {	
        if ($this->fech_est) {
		  return date("d", strtotime($this->fech_est))."/".date("m", strtotime($this->fech_est)). "/".date("Y", strtotime($this->fech_est));
        }
    }

    public function getData_fech_baja()
    {   
        if ($this->fech_baja) {
            return date("d", strtotime($this->fech_baja))."/".date("m", strtotime($this->fech_baja)). "/".date("Y", strtotime($this->fech_baja));
        }
    }

    public function getData_fech_dece()
    {   
        if ($this->fech_dece) {
            return date("d", strtotime($this->fech_dece))."/".date("m", strtotime($this->fech_dece)). "/".date("Y", strtotime($this->fech_dece));
        }
    }

    public function getDataEditGra()
    {	
		return date("d", strtotime($this->fech_gra))."/".date("m", strtotime($this->fech_gra)). "/".date("Y", strtotime($this->fech_gra)); 
    }

    public function getData_fech_ini_apor()
    {	
    	if ($this->fech_ini_apor) {
    		return date("d", strtotime($this->fech_ini_apor))."/".date("m", strtotime($this->fech_ini_apor)). "/".date("Y", strtotime($this->fech_ini_apor));
    	}
    }
    public function getData_fech_fin_apor()
    {	if ($this->fech_fin_apor) {
			return date("d", strtotime($this->fech_fin_apor))."/".date("m", strtotime($this->fech_fin_apor)). "/".date("Y", strtotime($this->fech_fin_apor));
	    }
	}

    public function getData_fech_ini_serv()
    {	
    	if ($this->fech_ini_serv) {
			return date("d", strtotime($this->fech_ini_serv))."/".date("m", strtotime($this->fech_ini_serv)). "/".date("Y", strtotime($this->fech_ini_serv));
   		}
   }
    public function getData_fech_fin_serv()
    {	if ($this->fech_fin_serv) {
			return date("d", strtotime($this->fech_fin_serv))."/".date("m", strtotime($this->fech_fin_serv)). "/".date("Y", strtotime($this->fech_fin_serv));
    	}
    }

    public function getData_fech_ini_anti()
    {	
    	if ($this->fech_ini_anti) {
			return date("d", strtotime($this->fech_ini_anti))."/".date("m", strtotime($this->fech_ini_anti)). "/".date("Y", strtotime($this->fech_ini_anti));
    	}
    }
    public function getData_fech_fin_anti()
    {	
    	if ($this->fech_fin_anti) {
			return date("d", strtotime($this->fech_fin_anti))."/".date("m", strtotime($this->fech_fin_anti)). "/".date("Y", strtotime($this->fech_fin_anti));
    	}
    }

    public function getData_fech_ini_reco()
    {	
    	if ($this->fech_ini_reco) {
			return date("d", strtotime($this->fech_ini_reco))."/".date("m", strtotime($this->fech_ini_reco)). "/".date("Y", strtotime($this->fech_ini_reco));
    	}
    }
    public function getData_fech_fin_reco()
    {	
    	if ($this->fech_fin_reco) {
			return date("d", strtotime($this->fech_fin_reco))."/".date("m", strtotime($this->fech_fin_reco)). "/".date("Y", strtotime($this->fech_fin_reco));
   		}
   	}


	public function getFullName()
    {
        return $this->grado->lit . ' ' . $this->pat . ' ' . $this->mat. ' ' . $this->nom;
    }

    public function getFullNametoPrint()
    {
        return $this->nom . ' ' . $this->nom2 . ' ' . $this->pat. ' ' . $this->mat;
    }

    public function getFullDateNactoPrint()
    {   
        if ($this->fech_nac) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            return date("d", strtotime($this->fech_nac))." de ".$meses[date("m", strtotime($this->fech_nac))-1]. " de ".date("Y", strtotime($this->fech_nac));
        }
    }
    public function getFullDirecctoPrint()
    {
        return $this->calle . ' ' . $this->num_domi . ' ' . $this->zona. ' ' . $this->depa_dir;
    }
    public function getFull_fech_decetoPrint()
    {   
        if ($this->fech_dece) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            return date("d", strtotime($this->fech_dece))." ".$meses[date("n", strtotime($this->fech_dece))-1]. " ".date("Y", strtotime($this->fech_dece)); 
        }
    }
    public function getFullDateIngtoPrint()
    {   
        if ($this->fech_ing) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            return date("d", strtotime($this->fech_ing))." ".$meses[date("m", strtotime($this->fech_ing))-1]. " ".date("Y", strtotime($this->fech_ing));
        }
    }
    public function getFull_fech_fin_aportoPrint()
    {   
        if ($this->fech_fin_apor) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            return date("d", strtotime($this->fech_fin_apor))." ".$meses[date("n", strtotime($this->fech_fin_apor))-1]. " ".date("Y", strtotime($this->fech_fin_apor));
        }
    }
    public function getData_fech_bajatoPrint()
    {   
        if ($this->fech_baja) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            return date("d", strtotime($this->fech_baja))." ".$meses[date("n", strtotime($this->fech_baja))-1]. " ".date("Y", strtotime($this->fech_baja));
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
