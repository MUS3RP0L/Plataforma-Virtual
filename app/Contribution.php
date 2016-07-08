<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Contribution extends Model
{
    use SoftDeletes;

    protected $table = 'contributions';

    protected $dates = ['deleted_at'];

    protected $fillable = [

    	'affiliate_id',
        'contribution_type_id',
        'contribution_payment_id',
        'degree_id',
        'unit_id',
        'category_id',
    	'month_year',
        'item',
        'base_wage',
        'dignity_pension',
        'seniority_bonus',
        'study_bonus',
        'position_bonus',
        'border_bonus',
        'east_bonus',
        'public_security_bonus',
        'deceased',
        'natality',
        'lactation',
        'prenatal',
        'subsidy',
        'gain',
        'payable_liquid',
        'quotable',
        'retirement_fund',
        'mortuary_quota',
        'mortuary_aid',
        'subtotal',
        'ipc',
        'total'

	];

    protected $guarded = ['id'];

    public function affiliate(){

        return $this->belongsTo('Muserpol\Affiliate');
    }
    
    public function degree(){

        return $this->belongsTo('Muserpol\Degree');
    }
    public function unit(){

        return $this->belongsTo('Muserpol\Unit');
    }

    public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeAfiIs($query, $id)
    {
        return $query->where('affiliate_id', $id);
    }

    public function scopeAfiAporte($query, $anio)
    {
        return $query = DB::table('contributions')
                    ->select(DB::raw('SUM(contributions.mus) muserpol, year(contributions.month_year) as month_yearion'))
                    ->whereYear('contributions.month_year', '=', $anio);
    }

    public function scopeAporteVoluntario($query, $mes, $anio)
    {
       return $query = DB::table('contributions')
                    ->select(DB::raw('COUNT(*) total, month(contributions.month_year) as mes'))
                    ->where('contributions.aporte_type_id', '=', 2)
                    ->whereMonth('contributions.month_year', '=', $mes)
                    ->whereYear('contributions.month_year', '=', $anio);        
    }  
}

Contribution::updating(function($contribution)
{
    Activity::updateContribution($contribution);
    
});
