<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;

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

    public function scopeFonTraIs($query, $id)
    {
        return $query->where('fondo_tramite_id', $id);
    }

    public function getData_fech_requi()
    {   
        return Util::getdateabre($this->fech_pres);
    }

    public function getDataEdit()
    {   
        return Util::getdateforEdit($this->fecha);
    }

}
