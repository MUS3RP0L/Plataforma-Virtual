<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Muserpol\Helper\Util;
use Auth;

define("ACTIVITY_TYPE_UPDATE_AFILIADO", 1);
define("ACTIVITY_TYPE_UPDATE_FONDO_RETIRO", 2);
define("ACTIVITY_TYPE_UPDATE_APORTE", 3);
define("ACTIVITY_TYPE_UPDATE_DOCUMENTO", 4);
define("ACTIVITY_TYPE_UPDATE_ANTECEDENTE", 5);
define("ACTIVITY_TYPE_UPDATE_CONYUGE", 6);
define("ACTIVITY_TYPE_UPDATE_SOLICITANTE", 7);

define("ACTIVITY_TYPE_CREATE_CONYUGE", 8);
define("ACTIVITY_TYPE_CREATE_SOLICITANTE", 9);
define("ACTIVITY_TYPE_CREATE_FONDO_RETIRO", 10);
define("ACTIVITY_TYPE_CREATE_DOCUMENTO", 11);
define("ACTIVITY_TYPE_CREATE_ANTECEDENTE", 12);

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

	public static function updateFondoRetiro($fondotramite)
	{		
		if (Auth::user()) 
		{   $afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $fondotramite->afiliado_id;
			$activity->fondo_tramite_id = $fondotramite->id;
			$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_FONDO_RETIRO;
			$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Fondo de Retiro', $afiliado);
			$activity->save();
		}		
	}

	public static function createdFondoRetiro($fondotramite)
	{		
		if (Auth::user()) 
		{   $afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $fondotramite->afiliado_id;
			$activity->fondo_tramite_id = $fondotramite->id;
			$activity->activity_type_id = ACTIVITY_TYPE_CREATE_FONDO_RETIRO;
			$activity->message = Util::encodeActivity(Auth::user(), 'Creó al Fondo de Retiro', $afiliado);
			$activity->save();
		}		
	}

	public static function updateAporte($aporte)
	{		
		if (Auth::user()) 
		{   $afiliado = Afiliado::findOrFail($aporte->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $aporte->afiliado_id;
			$activity->aporte_id = $aporte->id;
			$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_APORTE;
			$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Aporte', $afiliado);
			$activity->save();
		}		
	}

	public static function updateDocumento($documento)
	{		
		if (Auth::user())
		{	
			$fondotramite = FondoTramite::findOrFail($documento->fondo_tramite_id); 
		    $afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $fondotramite->afiliado_id;
			$activity->documento_id = $documento->id;
			$activity->fondo_tramite_id = $documento->fondo_tramite_id;
			$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_DOCUMENTO;
			$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Documento', $afiliado);
			$activity->save();
		}		
	}

	public static function createdDocumento($documento)
	{		
		if (Auth::user())
		{	
			$fondotramite = FondoTramite::findOrFail($documento->fondo_tramite_id); 
		    $afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $fondotramite->afiliado_id;
			$activity->documento_id = $documento->id;
			$activity->fondo_tramite_id = $documento->fondo_tramite_id;
			$activity->activity_type_id = ACTIVITY_TYPE_CREATE_DOCUMENTO;
			$activity->message = Util::encodeActivity(Auth::user(), 'Creó al Documento', $afiliado);
			$activity->save();
		}		
	}


	public static function updateAntecedente($antecedente)
	{		
		if (Auth::user())
		{	
			$fondotramite = FondoTramite::findOrFail($antecedente->fondo_tramite_id); 
		    $afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $fondotramite->afiliado_id;
			$activity->antecedente_id = $antecedente->id;
			$activity->fondo_tramite_id = $fondotramite->id;
			$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_ANTECEDENTE;
			$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Antecedente', $afiliado);
			$activity->save();
		}		
	}

	public static function createdAntecedente($antecedente)
	{		
		if (Auth::user())
		{	
			$fondotramite = FondoTramite::findOrFail($antecedente->fondo_tramite_id); 
		    $afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $fondotramite->afiliado_id;
			$activity->antecedente_id = $antecedente->id;
			$activity->fondo_tramite_id = $antecedente->fondo_tramite_id;
			$activity->activity_type_id = ACTIVITY_TYPE_CREATE_ANTECEDENTE;
			$activity->message = Util::encodeActivity(Auth::user(), 'Creó al Antecedente', $afiliado);
			$activity->save();
		}		
	}

	public static function updateConyuge($conyuge)
	{		
		if (Auth::user())
		{	
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $conyuge->afiliado_id;
			$activity->conyuge_id = $conyuge->id;
			$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_CONYUGE;
			$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Conyuge', $conyuge);
			$activity->save();
		}		
	}
	public static function createdConyuge($conyuge)
	{		
		if (Auth::user())
		{	
			
		    $activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $conyuge->afiliado_id;
			$activity->conyuge_id = $conyuge->id;
			$activity->activity_type_id = ACTIVITY_TYPE_CREATE_CONYUGE;
			$activity->message = Util::encodeActivity(Auth::user(), 'Creó al Conyuge', $conyuge);
			$activity->save();
		}		
	}

	public static function updateSolicitante($solicitante)
	{		
		if (Auth::user())
		{	
			$fondotramite = FondoTramite::findOrFail($solicitante->fondo_tramite_id); 
		    $afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $fondotramite->afiliado_id;
			$activity->solicitante_id = $solicitante->id;
			$activity->fondo_tramite_id = $solicitante->fondo_tramite_id;
			$activity->activity_type_id = ACTIVITY_TYPE_UPDATE_SOLICITANTE;
			$activity->message = Util::encodeActivity(Auth::user(), 'actualizó al Solicitante', $solicitante);
			$activity->save();
		}		
	}

	public static function createdSolicitante($solicitante)
	{		
		if (Auth::user())
		{	$fondotramite = FondoTramite::findOrFail($solicitante->fondo_tramite_id); 
			$afiliado = Afiliado::findOrFail($fondotramite->afiliado_id);
			$activity = new Activity;
			$activity->user_id = Auth::user()->id;
			$activity->afiliado_id = $afiliado->id;
			$activity->solicitante_id = $solicitante->id;
			$activity->fondo_tramite_id = $solicitante->fondo_tramite_id;
			$activity->activity_type_id = ACTIVITY_TYPE_CREATE_SOLICITANTE;
			$activity->message = Util::encodeActivity(Auth::user(), 'Creó al Solicitante', $solicitante);
			$activity->save();
		}		
	}


}
