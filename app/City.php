<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

	protected $fillable = [
	
		'name',
		'code'
	
	];

	protected $guarded = ['id'];

	public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }
}