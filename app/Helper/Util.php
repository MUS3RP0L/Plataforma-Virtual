<?php

namespace App\Helper;

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
		$timestamp_nac_day = substr($date, 0, 2);
		$timestamp_nac_month = substr($date, 2, 2);
		$timestamp_nac_year = substr($date, 4);

		return date($timestamp_nac_year ."-". $timestamp_nac_month ."-". $timestamp_nac_day);
	}

	public static function zero($string)
	{
		return preg_replace('/^0+/', '', $string);
	}

}