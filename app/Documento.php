<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;

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

    public function getData_fech_requi()
    {   
        return Util::getdateabre($this->fech_pres);
    }
}
