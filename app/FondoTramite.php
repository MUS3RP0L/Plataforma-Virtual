<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class FondoTramite extends Model
{
    protected $table = 'fondo_tramites';

	protected $fillable = [
		
		'afiliado_id',
		'modalidad_id',
		'departamento_id',
        'fech_ven',
        'fech_arc',
        'fech_cal',
        'fech_dic',
        'fech_ini_anti',
        'fech_fin_anti',
        'fech_ini_reco',
        'fech_fin_reco',
        'total_cot',
        'total_cot_adi',
        'subtotal',
        'rendimiento',
        'obs'
		
	];

	protected $guarded = ['id'];

	public function afiliado(){

        return $this->belongsTo('Muserpol\Afiliado');
    }

	public function modalidad(){

        return $this->belongsTo('Muserpol\Modalidad');
    }

    public function departamento(){

        return $this->belongsTo('Muserpol\Departamento');
    }

    public function documentos(){

        return $this->hasMany('Muserpol\Documento');
    }

    public function antecedentes(){

        return $this->hasMany('Muserpol\Antecedente');
    }

    public function solicitantes()
    {
        return $this->hasMany('Muserpol\Solicitante');
    }

    public function scopeAfiIs($query, $id)
    {
        return $query->where('afiliado_id', $id);
    }

}
