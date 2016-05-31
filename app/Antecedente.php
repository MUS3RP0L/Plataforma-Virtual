<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    protected $table = 'antecedentes';

    protected $fillable = [

    	'prestacion_id',
    	'fondo_tramite_id',
    	'est',
    	'fecha',
    	'nro_comp'
    ];

    protected $guarded = ['id'];

    public function fondo_tramite(){

        return $this->belongsTo('Muserpol\FondoTramite');
    }

    public function prestacion(){

        return $this->belongsTo('Muserpol\Prestacion');
    }
}
