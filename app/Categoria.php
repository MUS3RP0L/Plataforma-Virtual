<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

	protected $fillable = [
	
		'por'
	];

	protected $guarded = ['id'];

}
