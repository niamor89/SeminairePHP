(function (SC) {
	SC.Can = {}; // Namespace de dessin dans le canvas
	
	SC.Can.drawGame = function () {
		
		SC.ctx.clearRect(0,0,SC.can.height,SC.can.width);
		//SC.ctx.fillStyle = 'rgba(255,255,255,1)';
		//SC.ctx.fillRect(0,0,800,550);
		SC.Can.drawSprite(SC.Img.tiles,16,3,15,9);	
		SC.Can.drawMap();	
		SC.Can.drawRessources();
		
		SC.Can.drawMenu();
		
		SC.Can.drawPlayers();
		
		/*SC.Can.drawRessources();
		SC.Can.drawHouses();*/
	};
	
	SC.Can.drawSplash = function () {
		SC.ctx.clearRect(0,0,SC.can.height,SC.can.width);
		SC.ctx.fillStyle = 'rgba(255,255,255,1)';
		// Picture
		SC.ctx.fillRect(0,0,800,550);
		SC.ctx.drawImage(SC.Img.splash, 0, 0, 800, 550, 0, 0, 800, 550);
		// Loading BG
		SC.ctx.fillStyle = 'rgba(66,61,37,0.3)';
		SC.ctx.fillRect(100,450,600,30);
		// Loading PROGRESSION
		SC.ctx.fillStyle = 'rgba(66,61,37,1)';
		SC.ctx.fillRect(100,450,parseInt(SC.GL.Loading.progresion*6),30);
		// Loading Border
		SC.ctx.strokeStyle = 'rgba(255,255,255,0.5)';
		SC.ctx.strokeRect(99,449,602,32);
		// Loading Text
		SC.ctx.fillStyle = 'rgba(255,255,255,1)';
		SC.ctx.font = 'bold 18px Calibri';
		SC.ctx.fillText(SC.GL.Steps[SC.GL.Step],300,470);
		
		SC.GL.Loading.progresion
	};
	
	SC.Can.drawSprite = function (img,srcX,srcY,ctxX,ctxY) {
		SC.ctx.drawImage(img, srcX*32, srcY*32, 32, 32, ctxX*32, ctxY*32, 32, 32);
	};
	
	SC.Can.drawMenu = function () {		
		// BACKGROUND
		SC.ctx.fillStyle = 'rgba(173,134,105,1)';
		SC.ctx.fillRect(0,512,800,38);
		
		// INVENTORY
		SC.ctx.fillStyle = 'rgba(5,89,97,1)';
		SC.ctx.font = '24px Calibri';
		SC.ctx.fillText('Inventaire : ',20,538);
		SC.ctx.fillStyle = 'rgba(250,207,176,1)';
		SC.ctx.strokeStyle = 'rgba(20,97,113,1)';
		for(var i=0;i<6;i++) {
			SC.ctx.fillRect(150 +(i*32)+(i*10),516,32,32);
			SC.ctx.strokeRect(150 +(i*32)+(i*10),516,32,32);
		}
		
		// HAND
		SC.ctx.fillStyle = 'rgba(5,89,97,1)';
		SC.ctx.font = '24px Calibri';
		SC.ctx.fillText('Main : ',422,538);
		SC.ctx.fillStyle = 'rgba(250,207,176,1)';
		SC.ctx.strokeStyle = 'rgba(20,97,113,1)';
		SC.ctx.fillRect(492,516,32,32);
		SC.ctx.strokeRect(492,516,32,32);
		
		//LIFE
		SC.Can.drawSprite(SC.Img.items,5,76,17,16);
		SC.ctx.fillStyle = 'rgba(5,89,97,1)';
		SC.ctx.font = '24px Calibri';
		SC.ctx.fillText('0',578,538); // LIFE POINTS
		
		//RESTLESSNESS
		SC.Can.drawSprite(SC.Img.items,0,35,19,16.1);
		SC.ctx.fillStyle = 'rgba(5,89,97,1)';
		SC.ctx.font = '24px Calibri';
		SC.ctx.fillText('0',642,538); // LIFE POINTS
		
		//HUNGER
		SC.Can.drawSprite(SC.Img.items,4,76,21,16);
		SC.ctx.fillStyle = 'rgba(5,89,97,1)';
		SC.ctx.font = '24px Calibri';
		SC.ctx.fillText('0',706,538); // LIFE POINTS
		
		// SEPARATION
		SC.ctx.fillStyle = 'rgba(97,69,49,0.7)';
		SC.ctx.fillRect(0,510,800,4);
		
		
	};

	SC.Can.drawMap = function () {
		var i,j;
		var map = SC.Data.ENV.map;
		
		var l = map.length;
		var c = map[0].length;
		
		for(i=0;i<l;i++)
			for(j=0;j<c;j++) {
				SC.Can.drawSprite(SC.Img.tiles,map[i][j].t2x,map[i][j].t2y,j,i);
				SC.Can.drawSprite(SC.Img.tiles,map[i][j].t1x,map[i][j].t1y,j,i);
			}
	};

	SC.Can.drawPlayers = function () {
		var p;
		for(p in SC.Data.ENV.characters)
		{
			p=SC.Data.ENV.characters[p];
			var frame  = 0;
			if(p.Direction==4)
			{
				frame=6;
				/*SC.Can.Anim.left.animate(SC.Can.Anim.timer.getSeconds());
				var frame = SC.Can.Anim.left.getSprite();
				SC.Can.drawSprite(SC.Img.sprites,frame,p.Sprite,p.X,p.Y);
				SC.Can.Anim.timer.tick();*/
			}
			else if(p.Direction==3)
			{
				frame=3;
				/*SC.Can.Anim.bot.animate(SC.Can.Anim.timer.getSeconds());
				var frame = SC.Can.Anim.bot.getSprite();
				SC.Can.drawSprite(SC.Img.sprites,frame,p.Sprite,p.X,p.Y);
				SC.Can.Anim.timer.tick();*/
			}
			else if(p.Direction==2)
			{
				frame=9;
				/*SC.Can.Anim.right.animate(SC.Can.Anim.timer.getSeconds());
				var frame = SC.Can.Anim.right.getSprite();
				SC.Can.drawSprite(SC.Img.sprites,frame,p.Sprite,p.X,p.Y);
				SC.Can.Anim.timer.tick();*/
			}
			else if(p.Direction==1)
			{
				frame=1;
				
				/*SC.Can.Anim.top.animate(SC.Can.Anim.timer.getSeconds());
				var frame = SC.Can.Anim.top.getSprite();
				SC.Can.drawSprite(SC.Img.sprites,frame,p.Sprite,p.X,p.Y);
				SC.Can.Anim.timer.tick();*/
			}
			SC.Can.drawSprite(SC.Img.sprites,frame,p.Sprite,p.X,p.Y);
		}
	};
	SC.Can.drawRessources = function () {
		var r;
		for(r in SC.Data.ENV.ressources)
		{
			r=SC.Data.ENV.ressources[r];
			SC.Can.drawSprite(SC.Img.tiles,r.Sprite[0],r.Sprite[1],r.X,r.Y);
		}
	};
	/*
	SC.Can.drawConstructions = function ()
	{
		var i;
		for(i=0;i<houses.length;i++)
			SC.ctx.drawImage(sprites[2], 0, 0, 50, 50, (houses[i].x-1)*50, (houses[i].y-1)*50, 50, 50);
	};*/
})(SC);