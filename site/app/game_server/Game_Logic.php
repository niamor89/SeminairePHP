<?php
	function move($char,$dir) { //dir : 1 = top, 2 = right, 3 = bottom, 4 = left	
		if($dir==4) { // GAUCHE
			if($char->X-1>=0) {
				if(can_move($char,$dir))$char->X--;
				$char->Direction = 4;
			}
		}
		if($dir==2) { // DROITE
			if($char->X+1<25) {
				if(can_move($char,$dir))$char->X++;
				$char->Direction = 2;
			}
		}
		if($dir==1) { // HAUT
			if($char->Y-1>=0) {
				if(can_move($char,$dir))$char->Y--;
				$char->Direction = 1;
			}
		}
		if($dir==3) { // BAS
			if($char->Y+1<16) {
				if(can_move($char,$dir))$char->Y++;
				$char->Direction = 3;
			}
		}
		
		return true;
	}
	
	function can_move ($char,$dir) { //dir : 1 = top, 2 = right, 3 = bottom, 4 = left
	global $server;
		if($dir==1) {
			$x = $char->X;
			$y = $char->Y-1;
		}
		if($dir==2) {
			$x = $char->X +1;
			$y = $char->Y;
		}
		if($dir==3) {
			$x = $char->X;
			$y = $char->Y +1;
		}
		if($dir==4) {
			$x = $char->X -1;
			$y = $char->Y;
		}
		
		for($i=0;$i<count($server->ressources);$i++) 
		{
			$server->console('X:'.$server->ressources[$i]->X.'=='.$x);
			$server->console('Y:'.$server->ressources[$i]->Y.'=='.$y);
			if(($server->ressources[$i]->X)==$x && ($server->ressources[$i]->Y) == $y) 
				return false;
		}
		//for($i=0;$i<houses.length;$i++) $if(houses[$i].$x==$x && houses[$i].$y == $y) return false;
		
		return true;
	};
