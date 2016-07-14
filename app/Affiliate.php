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
        return $this->belongsTo('Muserpol\AffiliateState');
    }

    public function city()
    {
        return $this->belongsTo('Muserpol\City');
    }

    public function retirement_fund()
    {
        return $this->hasMany('Muserpol\RetirementFund');
    }

    public function reimbursements()
    {
        return $this->hasMany('Muserpol\Reimbursement');
    }

	public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeIdentitycardIs($query, $ci)
    {
        return $query->where('identity_card', $ci);
    }

    public function getTittleName()
    {
        return Util::ucw($this->first_name) . ' ' . Util::ucw($this->second_name)  . ' ' . Util::ucw($this->last_name) . ' ' . Util::ucw($this->mothers_last_name) . ' ' . Util::ucw($this->surname_husband);
    }

    public function getFullDateDeath()
    {   
        return Util::getdateabre($this->date_death);
    }

    public function getFullBirthDate()
    {   
        return Util::getdateabre($this->birth_date);
    }
    
    public function getHowOld()
    {
        if ($this->date_death) {
            return Util::getHowOldF($this->birth_date, $this->date_death) . " AÑOS";
        }
        else{
            return Carbon::parse($this->birth_date)->age . " AÑOS";
        }   
    }

    public function getFullGender()
    {
        if ($this->gender == 'M') {
            return "MASCULINO";
        } 
        else if ($this->gender == 'F'){
            return "FEMENINO";
        }
    }

    public function getFullCivilStatus()
    {
        if ($this->civil_status == 'S') {
            
            if ($this->sex == 'M') {
                return "SOLTERO";
            }
            else{
                return "SOLTERA";
            }         
        } 
        else if ($this->civil_status == 'C'){
            if ($this->sex == 'M') {
                return "CASADO";
            }
            else{
                return "CASADA";
            }
        }
        else if ($this->civil_status == 'V'){
            if ($this->sex == 'M') {
                return "VIUDO";
            }
            else{
                return "VIUDA";
            }
        }
        else if ($this->civil_status == 'D'){
            if ($this->sex == 'M') {
                return "DIVORCIADO";
            }
            else{
                return "DIVORCIADA";
            }
        }
    }

    public function getFullDateDecommissioned()
    {   
        return Util::getdateforEdit($this->date_decommissioned);
    }

    public function getFullDateEntry()
    {   
        return Util::getdateabre($this->date_entry);
    }





























    public function scopeAfibyState($query, $state, $year)
    {
       return $query = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) total'))
                    ->where('affiliates.affiliate_state_id', '=', $state)
                    ->whereYear('affiliates.updated_at', '=', $year);      
    }

    public function scopeAfibyType($query, $type, $year)
    {
       return $query = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) type'))
                    ->where('affiliates.affiliate_type_id', '=', $type)
                    ->whereYear('affiliates.updated_at', '=', $year);        
    }

    public function scopeAfiDistrict($query, $district, $year)
    {
       return $query = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) district'))
                    ->leftJoin('units', 'affiliates.unit_id', '=', 'units.id')
                    ->leftJoin('affiliate_states', 'affiliates.affiliate_state_id', '=', 'affiliate_states.id')
                    ->leftJoin('state_types', 'affiliate_states.state_type_id', '=', 'state_types.id')
                    ->where('units.district', '=', $district)
                    ->whereYear('affiliates.updated_at', '=', $year);        
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

Affiliate::created(function($affiliate)
{
    Record::CreatedAffiliate($affiliate);
});

Affiliate::updating(function($affiliate)
{
	// Activity::updateAfiliado($affiliate);
	Record::UpdatingAffiliate($affiliate);
});


