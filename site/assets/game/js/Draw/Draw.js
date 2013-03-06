(function (SC) {
	SC.Can = {}; // Namespace de dessin dans le canvas
	
	SC.Can.draw = function () {
		
		SC.ctx.clearRect(0,0,800,800);
		SC.Can.drawMap();
		/*SC.Can.drawRessources();
		SC.Can.drawHouses();
		
		SC.Can.drawPlayer();*/
		
		SC.ctx.fillText(++SC.FPS.Count / ( ((+new Date) - SC.FPS.last_sec) / 1000 ),20,20);
		
		//TEST					
		SC.Can.Anim.walk.animate(SC.Can.Anim.timer.getSeconds());
		var frame = SC.Can.Anim.walk.getSprite();
		SC.Can.drawSprite(SC.Img.sprites,frame,1,5,5);
		SC.Can.Anim.timer.tick();
	};
	
	SC.Can.drawSprite = function (img,srcX,srcY,ctxX,ctxY) {
		SC.ctx.drawImage(img, srcX*32, srcY*32, 32, 32, ctxX*32, ctxY*32, 32, 32);
	};

	SC.Can.drawMap = function () {
		var i,j;
		var map = SC.Data.ENV.map;
		
		var l = map.length;
		var c = map[0].length;
		
		for(i=0;i<l;i++)
			for(j=0;j<c;j++)
				SC.Can.drawSprite(SC.Img.tiles,map[i][j][0],map[i][j][1],j,i);
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