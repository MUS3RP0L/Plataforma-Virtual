<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class IpcRate extends Model
{
    protected $table = 'ipc_rates';

	protected $fillable = [
	
		'month_year',
		'index'
	];

	protected $guarded = ['id'];
}
