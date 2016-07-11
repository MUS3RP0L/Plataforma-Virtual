<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;
use Muserpol\Helper\Util;
use DB;

class Affiliate extends Model
{
	use SoftDeletes;

    protected $table = 'affiliates';

    protected $dates = ['deleted_at'];

	protected $fillable = [
	
    	'user_id',
    	'affiliate_state_id',
    	'affiliate_type_id',
    	'city_identity_card_id',
    	'city_birth_id',
    	'city_address_id',
    	'degree_id',
    	'unit_id',
    	'category_id',
    	'identity_card',
    	'registration',
    	'last_name',
    	'mothers_last_name',
    	'first_name',
    	'second_name',
    	'surname_husband',
    	'civil_status',
        'gender',
        'birth_date',
        'date_entry',
        'date_death',
        'reason_death',
        'date_decommissioned',
        'reason_decommissioned',
        'service_start_date',
        'service_end_date',
        'change_date',
        'zone',
        'Street',
        'number_address',
        'phone',
        'cell_phone',
        'afp',
        'nua',
    	'item'
	];

	protected $guarded = ['id'];

	public function contributions()
    {
        return $this->hasMany('Muserpol\Contribution');
    }

    public function records()
    {
        return $this->hasMany('Muserpol\Record');
    }

    public function spouse()
    {
        return $this->hasOne('Muserpol\Spouse');
    }

    public function applicats()
    {
        return $this->hasMany('Muserpol\Applicant');
    }

    public function user()
    {
        return $this->belongsTo('Muserpol\User');
    }

    public function degree(){

        return $this->belongsTo('Muserpol\Degree');
    }

    public function unit(){

        return $this->belongsTo('Muserpol\Unit');
    }

    public function affiliate_type()
    {
        return $this->belongsTo('Muserpol\AffiliateType');
    }

    public function affiliate_state()
    {
        return $this->belongsTo('Muserpol\AfiliateState');
    }

    public function city()
    {
        return $this->belongsTo('Muserpol\City');
    }

    public function retirement_fund()
    {
        return $this->hasMany('Muserpol\RetirementFund');
    }

	public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeCiIs($query, $ci)
    {
        return $query->where('ci', $ci);
    }

    public function scopeAfiEstado($query, $estado, $anio)
    {
       return $query = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) total1'))
                    ->where('affiliates.affiliate_state_id', '=', $estado)
                    ->whereYear('affiliates.updated_at', '=', $anio);      
    }

    public function scopeAfiType($query, $type, $anio)
    {
       return $query = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) tipo'))
                    ->where('affiliates.affiliate_type_id', '=', $type)
                    ->whereYear('affiliates.updated_at', '=', $anio);        
    }

    public function scopeAfiDistrito($query, $dist, $anio)
    {
       return $query = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) distrito'))
                    ->leftJoin('units', 'affiliates.unit_id', '=', 'units.id')
                    ->leftJoin('affiliate_states', 'affiliates.affiliate_state_id', '=', 'affiliate_states.id')
                    ->leftJoin('state_types', 'affiliate_states.state_type_id', '=', 'state_types.id')
                    ->where('units.district', '=', $dist)
                    ->whereYear('affiliates.updated_at', '=', $anio);        
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

    public function getDataEdit_fech_ing()
    {   
        return Util::getdateforEdit($this->fech_ing);
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
        return $this->grado->lit . ' ' . $this->nom . ' ' . $this->nom2 . ' ' . $this->pat. ' ' . $this->mat;
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

// Afiliado::created(function($afiliado)
// {
//     Note::createAfiliado($afiliado);
// });

// Afiliado::updating (function($afiliado)
// {
// 	Activity::updateAfiliado($afiliado);
// 	Note::updateAfiliado($afiliado);
// });


