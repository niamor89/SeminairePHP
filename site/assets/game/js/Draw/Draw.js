(function (SC) {
	SC.Can = {}; // Namespace de dessin dans le canvas
	
	SC.Can.draw = function () {
		SC.ctx.clearRect(0,0,800,800);
		SC.Can.drawMap();
		SC.Can.drawRessources();
		SC.Can.drawHouses();
		
		SC.Can.drawPlayer();
		
		SC.ctx.fillText(++FPS / ( ((+new Date) - last_sec) / 1000 ),20,20);
	};

	SC.Can.drawMap = function () {
		var i,j;
		for(i=0;i<16;i++)
			for(j=0;j<16;j++)
				SC.ctx.drawImage(sprites[map[j][i]], 0, 0, 50, 50, i*50, j*50, 50, 50);
	};

	SC.Can.drawPlayer = function () {
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
	};
})(SC);