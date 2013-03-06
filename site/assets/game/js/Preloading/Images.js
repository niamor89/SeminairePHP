(function (SC) {
	SC.Images = {}; // Namespace pour les Images
	
	// IMAGES A PRECHARGER
	var imgs = new Array();
	imgs.push('toto.jpg');
	imgs.push('tata.jpg');
	imgs.push('titi.jpg');
	
	SC.Images.preload = new Array(); // Images préchargées
	
	// Précharger les Images
	SC.Images.load_images = function (i) {
		if(i>=imgs.length) { Game_Loop(); return; }
		var img = new Image();
		img.src = 'assets/img/'+imgs[i];
		SC.Images.preload.push(img);
		img.onload = function () { SC.Images.load_images(i+1); };
		return;				
	};

	SC.Images.sprites = new Array(); // L'image des sprites

	// Précharger les Sprites
	// /!\Event : SC.Images.sprites_onload
	SC.Images.load_sprites = function () {
		SC.Images.sprites = new Image();
		SC.Images.sprites.src = 'assets/game/img/sprites.png';
		SC.Images.sprites.onload = function () {
			if(SC.Images.sprites_onload) SC.Images.sprites_onload(); //Execute le listener de l'event si tel existe
		};
	};
	
	// Précharger les Tiles
	// /!\Event : SC.Images.tiles_onload
	SC.Images.load_tiles = function () {
		SC.Images.tiles = new Image();
		SC.Images.tiles.src = 'assets/game/img/tiles.png';
		SC.Images.tiles.onload = function () {
			if(SC.Images.tiles_onload) SC.Images.tiles_onload(); //Execute le listener de l'event si tel existe
		};
	};
	
})(SC);