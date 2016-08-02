<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Muserpol\Helper\Util;

class Applicant extends Model
{
    protected $table = 'applicants';

	protected $fillable = [

    'retirement_fund_id',
    'applicant_type_id',
		'identity_card',
		'last_name',
		'mothers_last_name',
		'name',
		'kinship',
		'home_address',
    'home_phone_number',
    'home_cell_phone_number',
    'work_address'

	];

	protected $guarded = ['id'];


    public function applicant_type()
    {
        return $this->belongsTo('Muserpol\ApplicantType');
    }

    public function retirement_fund()
    {
        return $this->belongsTo('Muserpol\RetirementFund');
    }

    public function scopeFonTraIs($query, $id)
    {
        return $query->where('retirement_fund_id', $id);
    }

    public function getFullNametoPrint()
    {
        return $this->nom . ' ' . $this->pat. ' ' . $this->mat;
    }

    public function getParentesco()
    {
        if ($this->applicant_type->id == 3) {
            return $this->kinship;
        }else{
            return $this->applicant_type->name;
        }
    }

    public function getFullDateNactoPrint()
    {
        return Util::getfulldate($this->fech_nac);
    }

    public function getFullDireccDomitoPrint()
    {
        return $this->calle_domi . ' ' . $this->num_domi . ' ' . $this->zona_domi;
    }

    public function getFullDireccTrabtoPrint()
    {
        return $this->calle_trab . ' ' . $this->num_trab . ' ' . $this->zona_trab;
    }

    public function getFullNumber()
    {
        return $this->tele_domi . ' ' . $this->celu_domi;
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->mothers_last_name. ' ' . $this->first_name;
    }
}

Applicant::created(function($applicant)
{
    Activity::createdApplicant($applicant);

});

Applicant::updating(function($applicant)
{
    Activity::updateApplicant($applicant);

});
