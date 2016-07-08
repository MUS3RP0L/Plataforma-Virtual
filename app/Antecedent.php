<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;

class Antecedent extends Model
{
    protected $table = 'antecedents';

    protected $fillable = [

    	'antecedent_file_id',
    	'retirement_fund_id',
    	'status',
    	'reception_date',
    	'code'
    ];

    protected $guarded = ['id'];

    public function retirement_fund(){

        return $this->belongsTo('Muserpol\RetirementFund');
    }

    public function antecedent_file(){

        return $this->belongsTo('Muserpol\AntecedentFile');
    }

    public function scopeFonTraIs($query, $id)
    {
        return $query->where('fondo_tramite_id', $id);
    }

    public function getData_fech_requi()
    {   
        return Util::getdateabre($this->fech_pres);
    }

    public function getDataEdit()
    {   
        return Util::getdateforEdit($this->fecha);
    }

}

Antecedent::created(function($antecedent)
{
    Activity::createdAntecedent($antecedent);
    
});

Antecedent::updating(function($antecedent)
{
    Activity::updateAntecedent($antecedent);
    
});
