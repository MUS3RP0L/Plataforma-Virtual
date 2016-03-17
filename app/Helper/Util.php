<?php

namespace Muserpol\Helper;

class Util
{
	public static function decimal($number)
	{
		$sueMon = substr($number, 0, -2);
		$sueDeci = substr($number, -2);
		$sue = $sueMon . "." . $sueDeci;

		return $sue;
	}

	public static function date($date)
	{
		$nac_day = substr($date, 0, 2);
		$nac_month = substr($date, 2, 2);
		$nac_year = substr($date, 4);

	return date($nac_year ."-". $nac_month ."-". $nac_day);
	}

	public static function datePick($date)
	{
		$newdate = explode("/", $date);

	return date($newdate[2] ."-". $newdate[1] ."-". $newdate[0]);
	}

	public static function zero($string)
	{
		return preg_replace('/^0+/', '', $string);
	}

	public static function calcCat($b_ant, $sue)
	{
		if ($b_ant == 0 || $sue == 0) {
			return 0;
		}
		else
		{
			return number_format($b_ant/$sue, 2, '.', ',');
		}

	}

	public static function calcMatri($nac, $pat, $mat, $nom, $sex)
	{
		$nac_day = substr($nac, 0, 2);
		$nac_month = substr($nac, 2, 2);
		$nac_year = substr($nac, -2);

		$month_first = substr($nac_month, 0, 1);
		$month_second = substr($nac_month, 1, 1);
		
		if($pat  <> ''){
			$pat_first = substr($pat, 0, 1);		
		}
		else{
			$pat_first = '';
		}
		if($mat <> ''){
			$mat_first = substr($mat, 0, 1);		
		}
		else{
			$mat_first = '';
		}		
		if($nom<> ''){
			$nom_first = substr($nom, 0, 1);		
		}
		else{
			$nom_first = '';
		}

		if($sex == "M"){
			return $nac_year . $nac_month . $nac_day . $pat_first . $mat_first . $nom_first;
		}
		elseif ($sex == "F"){
			if($month_first = 0){
				$month_last = "5" .$month_second;
			}
			elseif ($month_first = 1) {
				$month_last = "6" . $month_second;
			}
			return $nac_year . $month_last . $nac_day . $pat_first . $mat_first . $nom_first;
		}
		
	}

	public static function formatMoney($value){

	    $value = number_format($value, 2, '.', ',');

        return $value;
    }

    public static function calcFon($mus)
	{
		return number_format($mus*0.0185/0.025, 2, '.', ',');

	}

	public static function calcVid($mus)
	{
		return number_format($mus*0.0065/0.025, 2, '.', ',');

	}

	public static function formatYear($year)
	{
		$first = substr($year, 0, 1); 

		if ($first == '9') {
			return "19" . $year;
		}
		else
		{
			return "20" . $year;
		}


	}

	public static function getAfp($afp)
	{
	    if ($afp == 'V') {
	        return true;
	    } 
	    else if ($afp == 'F'){
	        return false;
	    }
	}

	public static function getMes($mes)
	{
	    
	    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        return $meses[$mes-1];
	}

	public static function getAllMeses()
	{    
		return array('1' => 'Enero','2' => 'Febrero','3' => 'Marzo','4' => 'Abril','5' => 'Mayo','6' => 'Junio','7' => 'Julio','8' => 'Agosto','9' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
	}

}