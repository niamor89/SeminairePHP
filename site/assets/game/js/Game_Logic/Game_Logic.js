(function (SC) {
	SC.GL = {}; // Namespace de la logique coté client
	SC.GL.Game_Loop = function  () {
		
		SC.Can.draw();
		
		var t = setTimeout('Game_Loop()',15);
	};

	SC.GL.move = function (dir) { //dir : 1 = top, 2 = right, 3 = bottom, 4 = left	
		player.etat = 8;
		if(dir==4) { // GAUCHE
			if(player.x-1>0) {
				if(can_move(dir)) player.x--;
				player.direction = 3;
			}
		}
		if(dir==2) { // DROITE
			if(player.x+1<17) {
				if(can_move(dir)) player.x++;
				player.direction = 1;
			}
		}
		if(dir==1) { // HAUT
			if(player.y-1>0) {
				if(can_move(dir)) player.y--;
				player.direction = 2;
			}
		}
		if(dir==3) { // BAS
			if(player.y+1<17) {
				if(can_move(dir)) player.y++;
				player.direction = 0;
			}
		}	
	};

	SC.GL.can_move = function (dir) { //dir : 1 = top, 2 = right, 3 = bottom, 4 = left
		var x;
		var y;
		if(dir==1) {
			x = player.x;
			y = player.y-1;
		}
		if(dir==2) {
			x = player.x +1;
			y = player.y;
		}
		if(dir==3) {
			x = player.x;
			y = player.y +1;
		}
		if(dir==4) {
			x = player.x -1;
			y = player.y;
		}
		
		var i;
		for(i=0;i<ressources.length;i++) if(ressources[i].x==x && ressources[i].y == y) return false;
		for(i=0;i<houses.length;i++) if(houses[i].x==x && houses[i].y == y) return false;
		
		return true;
	};

	SC.GL.craft = function () {
		var x;
		var y;
		if(player.direction==0) { //player.direction : 0 = face, 1 = droite, 3 = gauche, 2 = dos 
			x = player.x;
			y = player.y+1;
		}
		if(player.direction==1) { 
			x = player.x +1;
			y = player.y;
		}
		if(player.direction==3) { 
			x = player.x -1;
			y = player.y;
		}
		if(player.direction==2) { 
			x = player.x;
			y = player.y-1;
		}
		
		var i;
		for(i=0;i<ressources.length;i++) 
			if(ressources[i].x==x && ressources[i].y == y) 
			{
				player.etat = 4;
				ressources[i].life--;
				if(ressources[i].life == 0) {
					if(ressources[i].type==1) //arbre
						player.wood++;
					else //rocher
						player.rock++;
						
					document.getElementById('wood').innerHTML = player.wood;
					document.getElementById('rock').innerHTML = player.rock;
					
					//enlever ressource
					var new_res = new Array();
					for(var j=0;j<ressources.length;j++) if(i!=j) new_res.push(ressources[j]);
					ressources = new_res;
					
					player.etat = 8;
					player.x=x;
					player.y=y;
				}
				return;
			}
	};

	SC.GL.build = function () {
		var x;
		var y;
		if(player.direction==0) { //player.direction : 0 = face, 1 = droite, 3 = gauche, 2 = dos 
			x = player.x;
			y = player.y+1;
		}
		if(player.direction==1) { 
			x = player.x +1;
			y = player.y;
		}
		if(player.direction==3) { 
			x = player.x -1;
			y = player.y;
		}
		if(player.direction==2) { 
			x = player.x;
			y = player.y-1;
		}
		if(player.wood>=1 && player.rock>=1)
		{
			//player.direction : 0 = face, 1 = droite, 3 = gauche, 2 = dos 
			if(player.direction==3) if(player.x-1==0)  return;
			if(player.direction==1) if(player.x+1==16) return;
			if(player.direction==2) if(player.y-1==0) return;
			if(player.direction==0) if(player.y+1==16) return;
			var i;
			for(i=0;i<ressources.length;i++) if(ressources[i].x==x && ressources[i].y == y) return;
			for(i=0;i<houses.length;i++) if(houses[i].x==x && houses[i].y == y) return;
			
			//construction possible
			player.etat = 0;
			player.wood--;
			player.rock--;
			document.getElementById('wood').innerHTML = player.wood;
			document.getElementById('rock').innerHTML = player.rock;
			houses.push(new House(x,y));
		}
	};
})(SC);