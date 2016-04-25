<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;

class Conyuge extends Model
{
    protected $table = 'conyuges';

	protected $fillable = [
	
		'ci',
		'pat',
		'mat',
		'nom',
		'nom2',
		'fech_dece',
		'motivo_dece'		
	];

	protected $guarded = ['id'];

	public function afiliado()
    {
        return $this->belongsTo('App\Afiliado');
    }

    public function getDataEdit_fech_nac()
    {	
		if ($this->fech_nac) {
		return date("d", strtotime($this->fech_nac))."/".date("m", strtotime($this->fech_nac)). "/".date("Y", strtotime($this->fech_nac));
 		}
    }

    public function getDataEdit_fech_dece()
    {	
		if ($this->fech_dece) {
		return date("d", strtotime($this->fech_dece))."/".date("m", strtotime($this->fech_dece)). "/".date("Y", strtotime($this->fech_dece));
 		}
    }

    public function getFullDateNac()
    {	
		$meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
		if ($this->fech_nac) {
			return date("d", strtotime($this->fech_nac))." ".$meses[date("n", strtotime($this->fech_nac))-1]. " ".date("Y", strtotime($this->fech_nac));
		}
    }public function getFullDateDece()
    {	
		$meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
		if ($this->fech_dece) {
			return date("d", strtotime($this->fech_dece))." ".$meses[date("n", strtotime($this->fech_dece))-1]. " ".date("Y", strtotime($this->fech_dece));
		}
    }

    public function getFullNametoPrint()
    {
        return $this->nom . ' ' . $this->nom2 . ' ' . $this->pat. ' ' . $this->mat;
    }
    
    public function getFullDateNactoPrint()
    {   
        if ($this->fech_nac) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            return date("d", strtotime($this->fech_nac))." de ".$meses[date("m", strtotime($this->fech_nac))-1]. " de ".date("Y", strtotime($this->fech_nac));
        }
    }
    public function getFull_fech_decetoPrint()
    {   
        if ($this->fech_dece) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            return date("d", strtotime($this->fech_dece))." ".$meses[date("n", strtotime($this->fech_dece))-1]. " ".date("Y", strtotime($this->fech_dece)); 
        }
    }
}
