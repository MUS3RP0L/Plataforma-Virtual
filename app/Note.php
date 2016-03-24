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
		if ($afiliado->grado_id) {
			
			$note = new Note;
			if (Auth::user()) {$user_id = Auth::user()->id;}else{$user_id = 1;}
			$note->user_id = $user_id;
			$note->afiliado_id = $afiliado->id;
			$note->fech = $afiliado->last;
			$note->grado_id = $afiliado->grado_id;
			$note->type = NOTE_TYPE_UPDATE_GRAD;
        	$grado = Grado::where('id', $afiliado->grado_id)->first();
			$note->message = "Afiliado cambio de grado a " . $grado->abre;
			$note->save();

		}
		if ($afiliado->afi_state_id) {

			$note = new Note;
			if (Auth::user()) {$user_id = Auth::user()->id;}else{$user_id = 1;}
			$note->user_id = $user_id;
			$note->afiliado_id = $afiliado->id;
			$note->fech = $afiliado->last;
			$note->afi_state_id = $afiliado->afi_state_id;
			$note->type = NOTE_TYPE_UPDATE_STATE;
			$afi_state = AfiState::where('id', $afiliado->afi_state_id)->first();
			$note->message = "Afiliado cambio de estado a " . $afi_state->name;
			$note->save();
		}		
	}

	public static function createAfiliado($afiliado)
	{					
		if ($afiliado->grado_id) {
			
			$note = new Note;
			if (Auth::user()) {$user_id = Auth::user()->id;}else{$user_id = 1;}
			$note->user_id = $user_id;
			$note->afiliado_id = $afiliado->id;
			$note->fech = $afiliado->last;
			$note->grado_id = $afiliado->grado_id;
			$note->type = NOTE_TYPE_UPDATE_GRAD;
        	$grado = Grado::where('id', $afiliado->grado_id)->first();
			$note->message = "Afiliado creado con grado de " . $grado->abre;
			$note->save();

		}
		if ($afiliado->afi_state_id) {

			$note = new Note;
			if (Auth::user()) {$user_id = Auth::user()->id;}else{$user_id = 1;}
			$note->user_id = $user_id;
			$note->afiliado_id = $afiliado->id;
			$note->fech = $afiliado->last;
			$note->afi_state_id = $afiliado->afi_state_id;
			$note->type = NOTE_TYPE_UPDATE_STATE;
			$afi_state = AfiState::where('id', $afiliado->afi_state_id)->first();
			$note->message = "Afiliado ingresó de " . $afi_state->name;
			$note->save();
		}		
	}
}
