<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;
use Auth;

define("ACTIVITY_TYPE_UPDATE_AFILIADO", 1);

class Activity extends Model
{
    public $timestamps = true;
	protected $softDelete = false;	

	public static function updateAfiliado($afiliado)
	{		
		if (Auth::user()) 
		{
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $afiliado->id;
			$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_AFILIADO;
			$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Afiliado', $afiliado);
			$activity->save();
		}		
	}
}
