<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;
use Auth;

define("NOTE_TYPE_UPDATE_GRAD", 1);
define("NOTE_TYPE_UPDATE_STATE", 2);

class Note extends Model
{
	public static function updateAfiliado($afiliado)
	{		
		if ($afiliado->grado_id || $afiliado->afi_state_id) {
			$note = new Note;
			if (Auth::user()) {$user_id = Auth::user()->id;}else{$user_id = 1;}
			$note->user_id = $user_id;
			$note->afiliado_id = $afiliado->id;

		if ($afiliado->grado_id) {
			
			$note->grado_id = $afiliado->grado_id;
			$note->type = NOTE_TYPE_UPDATE_GRAD;

		}elseif ($afiliado->afi_state_id) {

			$note->afi_state_id = $afiliado->afi_state_id;
			$note->type = NOTE_TYPE_UPDATE_STATE;
			
		}
		
		$note->fech = $afiliado->last;
		$note->message = "afiliado Actualizado";
		$note->obs = Util::encodeActivity(Auth::user(), 'actualizó ',);
		$note->save();
			
				
	}
}
