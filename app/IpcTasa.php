<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class IpcTasa extends Model
{
    protected $table = 'ipc_tasas';

	protected $fillable = [
	
		'gest',
		'ipc'
	];

	protected $guarded = ['id'];
}
