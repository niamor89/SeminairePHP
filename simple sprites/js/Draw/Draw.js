(function (SC) {
	SC.Can = {}; // Namespace de dessin dans le canvas
	
	SC.Can.draw = function () {
		
		SC.ctx.clearRect(0,0,800,800);
		SC.Can.drawMap();
		/*SC.Can.drawRessources();
		SC.Can.drawHouses();
		
		SC.Can.drawPlayer();*/
		
	};
	
	SC.Can.drawSprite = function (img,srcX,srcY,ctxX,ctxY) {
		SC.ctx.drawImage(img, srcX*32, srcY*32, 32, 32, ctxX*32, ctxY*32, 32, 32);
	};

	SC.Can.drawMap = function () {
		var img = SC.Img.sprites; //<<====== CHANGE HERE : sprites,items,tiles
	
		SC.can.height = img.height;
		SC.can.width = img.width;
		var i,j;
		
		var l = SC.can.height/2;
		var c = SC.can.width/2;;
		
		for(i=0;i<l;i++) {
			for(j=0;j<c;j++) {
				SC.Can.drawSprite(img,j,i,j,i);
			}
		}
		SC.ctx.fillStyle='rgba(250,10,10,1)';
		for(i=0;i<l;i++) {
			for(j=0;j<c;j++) {
				SC.ctx.fillRect(i*32,j*32,1,SC.can.width);
				SC.ctx.fillRect(i*32,j*32,SC.can.height,1);
				SC.ctx.fillText(i+';'+j,(i)*32,(j+1)*32);
			}
		}
	};
})(SC);