<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Afiliado extends Model
{
	use SoftDeletes;

    protected $table = 'afiliados';

    protected $dates = ['deleted_at'];

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

	protected $guarded = ['id'];

	public function aportes()
    {
        return $this->hasMany('App\Aporte');
    }

	public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeCiIs($query, $ci)
    {
        return $query->where('ci', $ci);
    }
}