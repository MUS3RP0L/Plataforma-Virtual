<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Titular extends Model
{
    protected $table = 'titulares';

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
		'fech_nac'
		
	];

	protected $guarded = ['id'];
}
