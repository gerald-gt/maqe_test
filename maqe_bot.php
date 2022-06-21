<?php
//R: Turn 90 degree to the right of MAQE Bot (clockwise)
//L: Turn 90 degree to the left of MAQE Bot (counterclockwise)
//WN: Walk straight for N point(s) where N can be any positive integers. For example, W1 means walking straight for 1 point.

function final_output($move)
{
	$l = strlen($move);
	$points = 0;
	$destination = 'north'; 
    $direction = '';
    $walk = 0;
    $x = 0 ; $y = 0 ;

	
	for ($i = 0; $i < $l; $i++) {

		
        //$direction = $direction . $move[$i] ; 
        if (isset($move[$i+1])) {
		if ($move[$i] == 'W' ) {
            $x = $x  ; 
            $y = $y ;
        }
        else if (($move[$i] == 'L' && $move[$i+1] == 'L') || ($move[$i] == 'R' && $move[$i+1] == 'R') ) {
            $destination = 'south' ;
            $i++;
        }
        else if ($move[$i] == 'L' && $move[$i+1] == 'R' && $destination == 'north' ) {
            $destination = 'north' ;
            $i++;
        }
        else if ($move[$i] == 'R' && $move[$i+1] == 'L' && $destination == 'north' ) {
            $destination = 'north' ;
            $i++;
        }
        else if ($move[$i] == 'L' && $move[$i+1] == 'R' && $destination == 'south' ) {
            $destination = 'south' ;
            $i++;
        }
        else if ($move[$i] == 'R' && $move[$i+1] == 'L' && $destination == 'south' ) {
            $destination = 'south' ;
            $i++;
        }
        else if ($move[$i] == 'R') {
			$destination = 'right' ;
        } 
		else if ($move[$i] == 'L') {
            $destination = 'left' ; 
        }
		else if (is_numeric($move[$i]) == true && ($destination == 'right' || $destination == 'left')  )
        $x = $x + $move[$i] ; 
        else if (is_numeric($move[$i]) == true && ($destination == 'south')  )
        $y = $y - $move[$i] ; 
        else if (is_numeric($move[$i]) == true && ($destination == 'north')  )
        $y = $y + $move[$i] ; 
    }
       
	}

	// final output bot
	echo  ($x .':'. $y) . ' Direction : ' .  ($destination) ;
}

	// get Walking code
	$movement = $_GET['movement'];
	final_output($movement);
	

?>

