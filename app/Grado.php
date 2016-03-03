<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    protected $table = 'grados';

	protected $fillable = [
	
	'niv',
	'grad',
	'lit',
	'abre'
	
	];

	protected $guarded = ['id'];

	public function sueldos()
    {
        return $this->hasMany('Muserpol\Sueldo');
    }

    public function afiliados()
    {
        return $this->hasMany('Muserpol\Afiliado');
    }
}