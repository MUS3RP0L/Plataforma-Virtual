<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirements';

	protected $fillable = [
		
        'retirement_fund_modality_id',
		'name',
        'shortened'
	];

	protected $guarded = ['id'];

	public function retirement_fund_modalities()
    {
        return $this->belongsTo('Muserpol\RetirementFundModality');
    }

    public function documents()
    {
        return $this->hasMany('Muserpol\Document');
    }

    public function scopeModalidadIs($query, $id)
    {
        return $query->where('modalidad_id', $id);
    }
}
