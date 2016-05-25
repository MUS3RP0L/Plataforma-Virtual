<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = [

    	'requisito_id',
    	'fondo_tramite_id',
    	'fech_pres',
    	'est_civ',
    	'obs'
    ];

    protected $guarded = ['id'];

    public function fondo_tramite(){

        return $this->belongsTo('Muserpol\FondoTramite');
    }

    public function requisito(){

        return $this->belongsTo('Muserpol\Requisito');
    }
}
