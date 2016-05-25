<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    protected $table = 'antecedentes';

    protected $fillable = [

    	'certificacion_id',
    	'prest_type_id',
    	'estado',
    	'fecha',
    	'nro_comp'
    ];

    protected $guarded = ['id'];

    public function certificacion(){

        return $this->belongsTo('Muserpol\Certificacion');
    }

    public function prest_type(){

        return $this->belongsTo('Muserpol\PrestType');
    }
}
