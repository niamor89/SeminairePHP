(function (SC) {
	SC.Can = {}; // Namespace de dessin dans le canvas
	
	SC.Can.draw = function () {
		
		SC.ctx.clearRect(0,0,SC.can.height,SC.can.width);
		SC.ctx.fillStyle = 'rgba(255,255,255,1)';
		SC.ctx.fillRect(0,0,800,550);
		SC.Can.drawSprite(SC.Img.tiles,16,3,15,9);	
		SC.Can.drawMap();		
		SC.Can.drawMenu();
		/*SC.Can.drawRessources();
		SC.Can.drawHouses();
		
		SC.Can.drawPlayer();*/
		SC.ctx.fillStyle = 'rgba(255,255,255,0.6)';
		SC.ctx.font = 'bold 18px Calibri';
		SC.ctx.fillText(parseInt(++SC.FPS.Count / ( ((+new Date) - SC.FPS.last_sec) / 1000 ))+' FPS',20,20);
		
		//TEST					
		/*SC.Can.Anim.walk.animate(SC.Can.Anim.timer.getSeconds());
		var frame = SC.Can.Anim.walk.getSprite();
		SC.Can.drawSprite(SC.Img.sprites,frame,1,5,5);
		SC.Can.drawSprite(SC.Img.items,1,1,5,6);
		SC.Can.Anim.timer.tick();*/
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

	/*SC.Can.drawPlayer = function () {
		var sprite;
		sprite = sprites[5+player.direction+player.etat];
		
		document.getElementById('alert').innerHTML = player.x;
		
		SC.ctx.drawImage(sprite, 0, 0, 50, 50, (player.x-1)*50, (player.y-1)*50, 50, 50);
	};

	SC.Can.drawRessources = function ()
	{
		var i;
		for(i=0;i<ressources.length;i++)
			SC.ctx.drawImage((ressources[i].type==1?sprites[3]:sprites[4]), 0, 0, 50, 50, (ressources[i].x-1)*50, (ressources[i].y-1)*50, 50, 50);
	};

	SC.Can.drawConstructions = function ()
	{
		var i;
		for(i=0;i<houses.length;i++)
			SC.ctx.drawImage(sprites[2], 0, 0, 50, 50, (houses[i].x-1)*50, (houses[i].y-1)*50, 50, 50);
	};*/
})(SC);