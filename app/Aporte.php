<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Aporte extends Model
{
    use SoftDeletes;

    protected $table = 'aportes';

    protected $dates = ['deleted_at'];

    protected $fillable = [

	'afiliado_id',

	'gest',

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
    'mus'

	];

    protected $guarded = ['id'];

    public function afiliado(){

        return $this->belongsTo('Muserpol\Afiliado');
    }
    
    public function grado(){

        return $this->belongsTo('Muserpol\Grado');
    }
    public function unidad(){

        return $this->belongsTo('Muserpol\Unidad');
    }

    public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeAfiIs($query, $id)
    {
        return $query->where('afiliado_id', $id);
    }

    public function scopeAfiAporte($query, $anio)
    {
        return $query = DB::table('aportes')
                    ->select(DB::raw('SUM(aportes.mus) muserpol, year(aportes.gest) as gestion'))
                    ->whereYear('aportes.gest', '=', $anio);
    }
}
