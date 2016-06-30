<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

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
}
