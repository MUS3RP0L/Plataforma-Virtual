<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

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
}
