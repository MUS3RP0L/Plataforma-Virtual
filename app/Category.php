<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

	protected $fillable = [
	
		'from',
		'to',
		'name',
		'percentage'
		
	];

	protected $guarded = ['id'];

}
