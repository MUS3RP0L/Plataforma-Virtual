<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';

    protected $fillable = [
	
        'fech_emi',
        'fech_ini_pcot',
        'fech_fin_pcot',
	];

	protected $guarded = ['id'];

}