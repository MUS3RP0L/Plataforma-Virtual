<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table = 'afiliados';

	protected $fillable = [
	
	'ci',
	'pat',
	'mat',
	'nom',
	'nom2',
	'ap_esp',
	'est_civ',
	'sex',
	'matri',
	'fech_nac',
	'fech_ing',
	
	];
}