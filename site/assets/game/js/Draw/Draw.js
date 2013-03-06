(function (SC) {
	SC.Canvas = {}; // Namespace de dessin dans le canvas
	function draw() {
		ctx.clearRect(0,0,800,800);
		drawMap();
		drawRessources();
		drawHouses();
		
		drawPlayer();
		
		ctx.fillText(++FPS / ( ((+new Date) - last_sec) / 1000 ),20,20);
	}

	function drawMap() {
		var i,j;
		for(i=0;i<16;i++)
			for(j=0;j<16;j++)
				ctx.drawImage(sprites[map[j][i]], 0, 0, 50, 50, i*50, j*50, 50, 50);
	}

	function drawPlayer() {
		var sprite;
		sprite = sprites[5+player.direction+player.etat];
		
		document.getElementById('alert').innerHTML = player.x;
		
		ctx.drawImage(sprite, 0, 0, 50, 50, (player.x-1)*50, (player.y-1)*50, 50, 50);
	}

	function drawRessources()
	{
		var i;
		for(i=0;i<ressources.length;i++)
			ctx.drawImage((ressources[i].type==1?sprites[3]:sprites[4]), 0, 0, 50, 50, (ressources[i].x-1)*50, (ressources[i].y-1)*50, 50, 50);
	}

	function drawHouses()
	{
		var i;
		for(i=0;i<houses.length;i++)
			ctx.drawImage(sprites[2], 0, 0, 50, 50, (houses[i].x-1)*50, (houses[i].y-1)*50, 50, 50);
	}
})(SC);