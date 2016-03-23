<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;
use Auth;

define("NOTE_TYPE_UPDATE_GRAD", 1);

class Note extends Model
{
	public static function updateAfiliado($afiliado)
	{		
		if (Auth::user()) 
		{

			$note = new Note;
			$note->user_id = Auth::user()->id;
			$note->afiliado_id = $afiliado->id;
			$note->grado_id = $afiliado->grado_id;
			$note->afi_state_id = $afiliado->afi_state_id;

			$note->type = NOTE_TYPE_UPDATE_GRAD;
			$action = 
			$note->obs = Util::encodeActivity(Auth::user(), 'actualizó ',);
			$note->save();
		}		
	}
}
