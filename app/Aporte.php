<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aporte extends Model
{
    use SoftDeletes;

    protected $table = 'aportes';

    protected $dates = ['deleted_at'];

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
    'b_ant',
    'b_est',
    'b_car',
    'b_fro',
    'b_ori',
    'b_seg',

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
