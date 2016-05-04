<?php

namespace Muserpol\Helper;
use Carbon\Carbon;

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
		$nac_year = substr($date, 4, 4);

		return date($nac_year ."-". $nac_month ."-". $nac_day);
	}

	public static function dateAADDMM($date)
	{
		$nac_year = substr($date, 0, 2);
		$nac_day = substr($date, 2, 2);
		$nac_month = substr($date, 4, 2);

        $anios = array('2' => '19', '3' => '19', '4' => '19', '5' => '19', '6' => '19','7' => '19', '8' => '19', '9' => '19','0' => '20','1' => '20','2' => '20','3' => '20');
        $a = substr($nac_year, 0, 1);

	return date($anios[$a] . $nac_year ."-". $nac_month ."-". $nac_day);
	}

	public static function dateAAMMDD($date)
	{
		$nac_year = substr($date, 0, 2);
		$nac_month = substr($date, 2, 2);
		$nac_day = substr($date, 4, 2);

        $anios = array('2' => '19', '3' => '19', '4' => '19', '5' => '19', '6' => '19','7' => '19', '8' => '19', '9' => '19','0' => '20','1' => '20','2' => '20','3' => '20');
        $a = substr($nac_year, 0, 1);

		return date($anios[$a] . $nac_year ."-". $nac_month ."-". $nac_day);
	}

	public static function dateDDMMAA($date)
	{
		$nac_day = substr($date, 0, 2);
		$nac_month = substr($date, 2, 2);
		$nac_year = substr($date, 4, 2);

        $anios = array('2' => '19', '3' => '19', '4' => '19', '5' => '19', '6' => '19','7' => '19', '8' => '19', '9' => '19','0' => '20','1' => '20','2' => '20','3' => '20');
        $a = substr($nac_year, 0, 1);

		return date($anios[$a] . $nac_year ."-". $nac_month ."-". $nac_day);
	}

	public static function FirstName($nom)
	{
		$noms = explode(" ", $nom);
		if (count($noms) > 0) {
			return $noms[0];
		}
		else{
			return '';
		}
	}

	public static function OtherName($nom)
	{
		$noms = explode(" ", $nom);
		if (count($noms) > 1) {
			return $noms[1];
		}
		else{
			return '';
		}
	}

	public static function datePick($date)
	{
		if ($date) {
			$newdate = explode("/", $date);
			return date($newdate[2] ."-". $newdate[1] ."-". $newdate[0]);
		}
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
		else{
			return number_format($b_ant/$sue, 2, '.', ',');
		}
	}

	public static function calcMatri($nac, $pat, $mat, $nom, $sex)
	{
		$newnac = explode("-", $nac);
		$nac_day = $newnac[2];
		$nac_month = $newnac[1];
		$nac_year = substr($newnac[0], -2);

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

	public static function formatYear($year)
	{
		$first = substr($year, 0, 1); 

		if ($first == '9') {
			return "19" . $year;
		}
		else{
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

	public static function getdateabre($date)
	{
		if ($date) {
            $meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
		  return date("d", strtotime($this->date))." ".$meses[date("n", strtotime($this->date))-1]. " ".date("Y", strtotime($this->date));
        }
	}
	
	public static function getMonthMM($month)
	{
        $months = array('1' => '01', '2' => '02', '3' => '03', '4' => '04', '5' => '05','6' => '06', '7' => '07', '8' => '08', '9' => '09', '10' => '10', '11' => '11', '12' => '12');
		return date($months[$month]);
	}

 	public static function encodeActivity($person = null, $action, $entity = null)
	{
		$person = $person->getFullName();
		$entity = $entity->getFullName();
		return trim("$person $action $entity");
	}

	public static function encodeNote($type, $person = null)
	{
		$person = $person->getFullName();
		$entity = $entity->getFullName();
		return trim("$person $action $entity");
	}

}