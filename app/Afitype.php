<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AfiType extends Model
{
    protected $table = 'afi_types';

	protected $fillable = [
	
		'name'
		
	];

	protected $guarded = ['id'];

	public function afi_states()
    {
        return $this->hasMany('Muserpol\AfiState');
    } 
}
