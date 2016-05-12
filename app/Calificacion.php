<?php

namespace Muserpol;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Muserpol\Helper\Util;

class Calificacion extends Model
{
    protected $table = 'calificaciones';

    protected $fillable = [
	
        'fech_emi',
        'fech_ini_pcot',
        'fech_fin_pcot',
	];

	protected $guarded = ['id'];

	public function getFull_fech_ini_pcot()
    {   
        return Util::getdateabreperiod($this->fech_ini_pcot);
    }
    public function getFull_fech_fin_pcot()
    {   
        return Util::getdateabreperiod($this->fech_fin_pcot);
    }
    public function getYearsAndMonths_fech_pcot()
    {
        return Util::getYearsAndMonths($this->fech_ini_pcot, $this->fech_fin_pcot);
    }

    public function getMonths_fech_pcot()
    {
        return Util::getMonths($this->fech_ini_pcot, $this->fech_fin_pcot);
    }

}