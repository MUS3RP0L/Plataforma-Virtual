<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

	protected $fillable = [
	
		'name',
		'cod'
	
	];

	protected $guarded = ['id'];

	public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }
}