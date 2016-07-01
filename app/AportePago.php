<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AportePago extends Model
{
    protected $table = 'aporte_pagos';

	protected $fillable = [
	
        'user_id',
        'afiliado_id',
        'fech_pago',
        'periodo',        
        'cot',
        'mus',
        'fr',
        'sv',
        'ipc',
        'total'
	];

	protected $guarded = ['id'];

    public function afiliado(){

        return $this->belongsTo('Muserpol\Afiliado');
    }

    public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function getNumberTram()
    {
        if ($this->codigo) {
            return $this->codigo . "/" . Carbon::parse($this->created_at)->year;
        }
    }
}
