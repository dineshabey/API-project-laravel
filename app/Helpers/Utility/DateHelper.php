<?php
namespace App\Helpers\Utility;
use DateTime;
/**
 * Class DateHelper.
 */
class DateHelper
{
    public static function get_exact_age($dob,$in_months=false){

		$dt_dob = new DateTime($dob);
		$dt_today = new Datetime();
		$diff = $dt_today->diff($dt_dob);

		if($in_months)
			return $diff->m;

		return	$diff->y;
        
    }

    public static function get_nearest_age($dob){

    	$dt_dob = new DateTime($dob);
		$dt_today = new Datetime();
		
        $diff = $dt_today->diff($dt_dob);
        
		if ($diff->d > 0 )
		{
			$s=$diff->y;
			$s++;
			return $s ;
		}
		else
		{
			$s=$diff->y;
			return $s;
		}
    }

}