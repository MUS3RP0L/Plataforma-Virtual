<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aporte extends Model
{
    protected $table = 'aportes';

    public function afiliado(){

    	return $this->belongsTo('Afiliado');
    }

    protected $fillable = [

	'afiliado_id',
	'mes',
	'anio',
    'uni',
    'desg',
    'niv',
    'gra',
    'item',
    'cat',           
    'sue',
    'ant',
    'b_est',
    'b_car',
    'b_fron',
    'b_ori',
    'seg',
    'dfu',
    'nat',
    'lac',
    'pre',
    'sub',
    'gan',
    'cot',
    'cot_adi',
    'mus',

	];
}
