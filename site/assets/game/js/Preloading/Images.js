(function (SC) {
	SC.Img = {}; // Namespace pour les Images
	
	// IMAGES A PRECHARGER
	var imgs = new Array();
	//imgs.push('toto.jpg');
	//imgs.push('tata.jpg');
	//imgs.push('titi.jpg');
	
	SC.Img.preload = new Array(); // Images préchargées
	
	// Précharger les Images
	SC.Img.load_images = function (i) {
		if(i>=imgs.length) { SC.GL.Game_Loop(); return; }
		var img = new Image();
		img.src = 'assets/img/'+imgs[i];
		SC.Img.preload.push(img);
		img.onload = function () { SC.Img.load_images(i+1); };
		return;				
	};

	SC.Img.sprites = new Array(); // L'image des sprites

	// Précharger les Sprites
	// /!\Event : SC.Img.sprites_onload
	SC.Img.load_sprites = function () {
		SC.Img.sprites = new Image();
		SC.Img.sprites.src = 'assets/game/img/sprites.png';
		SC.Img.sprites.onload = function () {
			if(SC.Img.sprites_onload) SC.Img.sprites_onload(); //Execute le listener de l'event si tel existe
		};
	};
	
	// Précharger les Tiles
	// /!\Event : SC.Img.tiles_onload
	SC.Img.load_tiles = function () {
		SC.Img.tiles = new Image();
		SC.Img.tiles.src = 'assets/game/img/tiles.png';
		SC.Img.tiles.onload = function () {
			if(SC.Img.tiles_onload) SC.Img.tiles_onload(); //Execute le listener de l'event si tel existe
		};
	};
	
})(SC);