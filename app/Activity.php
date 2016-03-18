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

	public function scopeScope($query)
	{
		return $query->whereAccountId(Auth::user()->account_id);
	}

	private static function getBlank($entity = false)
	{
		$activity = new Activity;

		if ($entity) 
		{
			$activity->user_id = $entity->user_id;
		} 
		else if (Auth::check())
		{
			$activity->user_id = Auth::user()->id;
		} 
		else 
		{
			Utils::fatalError();
		}

		return $activity;
	}

	public static function updateAfiliado($afiliado)
	{		
		$activity = Activity::getBlank();
		$activity->afiliado_id = $afiliado->id;
		$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_AFILIADO;
		$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Afiliado', $afiliado);
		$activity->save();		
	}
}
