(function (window) {
	var SC = {}; // Namespace g�n�ral
	window.SC = SC;
	
	//FPS
	SC.FPS = {}; // Namespace FPS
	SC.FPS.last_sec = new Date();
	SC.FPS.Count=0;			

	window.onload = function () {
		//CANVAS
		SC.can = document.getElementById('session_canvas');
		SC.ctx = SC.can.getContext('2d');
		
		//SC.Img.load_images(0);
		SC.Img.load_sprites(function () {
			SC.Img.load_tiles(function () {
				SC.Img.load_items(function () {
					SC.Can.draw();
				});
			});
		});
		
		
		document.body.onkeydown = function (evt) {
			//alert(evt.keyCode);
			//MOVEMENTS
			/*if(evt.keyCode==37) move(4);
			if(evt.keyCode==39) move(2);
			if(evt.keyCode==38) move(1);
			if(evt.keyCode==40) move(3);
			
			//CRAFT
			if(evt.keyCode==67) craft();
			//BUILD
			if(evt.keyCode==66) build();*/
		};
	};
	
})(window);