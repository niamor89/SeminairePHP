(function (SC) {
	SC.GL = {}; // Namespace de la logique coté client
	
	SC.GL.Step = 0; 
	SC.GL.Steps = [  //LOGICAL STEPS : 
					"Doing random stuf", // Loading images
					"Just sitting here and ... waiting", // Try to initiate a communication
					"Inserting random bugs", // Loading map
					"Checking your bank account", // Loading character
					"Admire flowers", // Loading ressources
					"Is actually ready, just listen to music", // Is actually real
				 ];
	
	SC.GL.Game_Loop = function  () {
		
		SC.Can.drawGame();
		
		var t = setTimeout('SC.GL.Game_Loop()',30);
	};
	
	SC.GL.Loading = {};
	SC.GL.Loading.progresion = 0;
	
	SC.GL.next_step = function(nb) {
		SC.GL.Loading.progresion += nb || 0;
		if(SC.GL.Step==0) {// Loading images
			
			if((SC.Img.sprites || SC.Img.load_sprites(function() {SC.GL.next_step(10)})) && 
			   (SC.Img.tiles || SC.Img.load_tiles(function() {SC.GL.next_step(10)}))  && 
			   (SC.Img.items || SC.Img.load_items(function() {SC.GL.next_step(10)}))
			   ) { SC.GL.Step++; SC.GL.next_step();}		
		}
		else if(SC.GL.Step==1) {// Try to initiate a communication
			if(SC.IO.ws || SC.IO.init(function() {SC.GL.next_step(10)})) { SC.GL.Step++; SC.GL.next_step();}	
		}
		else if(SC.GL.Step==2) {// Loading map
			if(SC.Data.ENV.map) { SC.GL.Step++; SC.GL.next_step(10); }
			else var t= setTimeout('SC.GL.next_step(0);',3000);
		}
		else if(SC.GL.Step==3) {// Loading character
			if(SC.Data.ENV.characters.length>0) { SC.GL.Step++; SC.GL.next_step(20); }
			else var t= setTimeout('SC.GL.next_step(0);',3000);
		}
		else if(SC.GL.Step==4) {// Loading ressources
			if(SC.Data.ENV.ressources.length>0) { SC.GL.Step++; SC.GL.next_step(20); }
			else var t= setTimeout('SC.GL.next_step(0);',3000);
		}
		else {//Is actually ready, juste listen to music
			var t = setTimeout('SC.GL.next_step(100);',3000);
		}
		SC.Can.drawSplash();
		if(SC.GL.Loading.progresion>=100) {
			SC.GL.Loading.progresion=100;
			SC.GL.Game_Loop();
		}			
		
	};

	/*SC.GL.craft = function () {
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
	};*/
})(SC);