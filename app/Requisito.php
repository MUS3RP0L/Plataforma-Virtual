<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $table = 'requisitos';

	protected $fillable = [
		'modalidad_id',
		'name'
	];

	protected $guarded = ['id'];

	public function modalidad()
    {
        return $this->belongsTo('Muserpol\Modalidad');
    }

    public function documentos()
    {
        return $this->hasMany('Muserpol\Documento');
    }

    public function scopeModalidadIs($query, $id)
    {
        return $query->where('modalidad_id', $id);
    }
}
