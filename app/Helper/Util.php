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

	public static function zero($string)
	{
		return preg_replace('/^0+/', '', $string);
	}

	public static function calcCat($b_ant, $sue)
	{
		if ($b_ant == 00000000.00 || $sue == 00000000.00) {
			return '';
		}
		else
		{
			return $cat = $b_ant/$sue;
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
    
    public static function formatMoneyBs($value){

	    $value = number_format($value, 2, '.', ',');
        $symbol = 'Bs ';

        return "<p class='text-right'>{$symbol}{$value}</p>";
    }

    public static function calcFon($mus)
	{
		return number_format($mus*0.0185/0.025, 2, '.', ',');

	}

	public static function calcVid($mus)
	{
		return number_format($mus*0.0065/0.025, 2, '.', ',');

	}

}