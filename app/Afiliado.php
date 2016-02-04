<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table = 'afiliados';

	protected $fillable = [

	// 1 CAR
	'ci',
	// 2 PAT
	'pat',
	// 3 MAT
	'mat',
	// 4 NOM
	'nom',
	// 5 NOM2
	'nom2',
	// 6 APES
	'ap_esp',
	// 7 ECIV
	'est_civ',
	// 8 SEX
	'sex',
	//11 Calcular
	'matri',
	// 9 NAC
	'fech_nac',
	// 10 ING
	'fech_ing',
	
	];
}