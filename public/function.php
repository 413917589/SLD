<?php 
  function diffBetweenTwoDays ($day1, $day2){ //计算时间差
  				$second1 = strtotime($day1);
  				$second2 = strtotime($day2);
    			if ($second1 < $second2) {
   					 $tmp = $second2;
   					 $second2 = $second1;
   					 $second1 = $tmp;
  				}
  				return ($second1 - $second2) / 86400;
	}


 ?>

