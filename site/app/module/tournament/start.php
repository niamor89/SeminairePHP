<?php
//FUNCTION FOR TIME LEFT
function time_left($integer)
{ 
	$seconds=$integer; 
	if ($seconds/60 >=1) 
	{ 
		$minutes=floor($seconds/60); 
		
		if ($minutes/60 >= 1) 
			{ # Hours 
				$hours=floor($minutes/60); 
					
					if ($hours/24 >= 1) 
					{ #days 
						$days=floor($hours/24); 
						
						if ($days/7 >=1) 
						{ #weeks 
							$weeks=floor($days/7); 
							
							if ($weeks>=2) $return="$weeks Weeks"; 
							else $return="$weeks Week"; 
						} #end of weeks 
						$days=$days-(floor($days/7))*7; 
					
					if ($weeks>=1 && $days >=1) $return="$return, "; 
						if ($days >=2) $return="$return $days days";
							if ($days ==1) $return="$return $days day";
					} #end of days

				$hours=$hours-(floor($hours/24))*24; 
					if ($days>=1 && $hours >=1) $return="$return, "; 
					if ($hours >=2) $return="$return $hours hours";
					if ($hours ==1) $return="$return $hours hour";
			} #end of Hours

		$minutes=$minutes-(floor($minutes/60))*60; 
			if ($hours>=1 && $minutes >=1) $return="$return, "; 
			if ($minutes >=2) $return="$return $minutes minutes";
			if ($minutes ==1) $return="$return $minutes minute";

	} #end of minutes 

	$seconds=$integer-(floor($integer/60))*60; 
		if ($minutes>=1 && $seconds >=1) $return="$return, "; 
		if ($seconds >=2) $return="$return $seconds seconds";
		if ($seconds ==1) $return="$return $seconds second";

	$return="$return."; 

	return $return; 
}
?>

<?php
$start_date = 1462658359;

$time_left= time_left($start_date);
?>