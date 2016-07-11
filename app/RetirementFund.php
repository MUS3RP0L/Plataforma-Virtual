<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;
use Muserpol\Helper\Util;
use DB;

class RetirementFund extends Model
{
    use SoftDeletes;

    protected $table = 'retirement_funds';

    protected $dates = ['deleted_at'];

	protected $fillable = [
		
		'affiliate_id',
		'retirement_fund_modality_id',
		'city_id',
        'code',
        'reception_date',
        'check_file_date',
        'qualification_date',
        'legal_assessment_date',
        'anticipation_start_date',
        'anticipation_end_date',
        'recognized_start_date',
        'recognized_end_date',
        'total_quotable',
        'total_additional_quotable',
        'rensubtotaldimiento',
        'performance',
        'total',
        'comment'
		
	];

	protected $guarded = ['id'];

	// public function afiliado(){

 //        return $this->belongsTo('Muserpol\Afiliado');
 //    }

	// public function modalidad(){

 //        return $this->belongsTo('Muserpol\Modalidad');
 //    }

 //    public function departamento(){

 //        return $this->belongsTo('Muserpol\Departamento');
 //    }

 //    public function documentos(){

 //        return $this->hasMany('Muserpol\Documento');
 //    }

 //    public function antecedentes(){

 //        return $this->hasMany('Muserpol\Antecedente');
 //    }

 //    public function solicitantes()
 //    {
 //        return $this->hasMany('Muserpol\Solicitante');
 //    }

    public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id)->where('deleted_at', '=', null)->orderBy('id', 'desc');
    }

    public function scopeAfiIs($query, $id)
    {
        return $query->where('afiliado_id', $id);
    }
    public function scopeNroTramites($query, $mes, $anio)
    {
       return $query = DB::table('retirement_funds')
                    ->select(DB::raw('COUNT(*) total, month(retirement_funds.reception_date) as mes'))
                    ->whereMonth('retirement_funds.reception_date', '=', $mes)
                    ->whereYear('retirement_funds.reception_date', '=', $anio);        
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

    public function getNumberTram()
    {
        if ($this->codigo) {
            return $this->codigo . "/" . Carbon::parse($this->created_at)->year;
        }
    }

    public function getStatus()
    {
        if ($this->fech_ven && $this->fech_arc && $this->fech_cal && $this->fech_dic ) {
            return "FINALIZADO";
        }elseif ($this->fech_ven && $this->fech_arc && $this->fech_cal) {
            return "DICTAMEN LEGAL";
        }elseif ($this->fech_ven && $this->fech_arc) {
            return "CALIFICACIÓN";
        }elseif ($this->fech_ven) {
            return "ARCHIVO";
        }else {
            return "VENTANILLA";
        }
    }
    

}

FondoTramite::created(function($fondotramite)
{
    Activity::createdFondoRetiro($fondotramite);
    
});

FondoTramite::updating(function($fondotramite)
{
    Activity::updateFondoRetiro($fondotramite);
    
});
