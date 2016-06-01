<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

	protected $fillable = [
	
		'name'
	];

	protected $guarded = ['id'];

	public function usuarios()
    {
        return $this->hasMany('Muserpol\Usuarios');
    }
}
