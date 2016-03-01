<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AfiState extends Model
{
    protected $table = 'afi_states';

	protected $fillable = [
	
		'name'
	
	];

	protected $guarded = ['id'];

	public function afi_type()
    {
        return $this->belongsTo('Muserpol\AfiType');
    }
}
