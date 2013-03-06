(function (SC) {
	SC.Img = {}; // Namespace pour les Images
	
	// IMAGES A PRECHARGER
	var imgs = new Array();
	//imgs.push('toto.jpg');
	//imgs.push('tata.jpg');
	//imgs.push('titi.jpg');
	
	SC.Img.preload = new Array(); // Images pr�charg�es
	
	// Pr�charger les Images
	SC.Img.load_images = function (i) {
		if(i>=imgs.length) { SC.GL.Game_Loop(); return; }
		var img = new Image();
		img.src = '/assets/img/'+imgs[i];
		SC.Img.preload.push(img);
		img.onload = function () { SC.Img.load_images(i+1); };
		return;				
	};

	SC.Img.sprites = new Array(); // L'image des sprites

	// Pr�charger les Sprites
	// /!\Event : SC.Img.sprites_onload
	SC.Img.load_sprites = function (func_onload) {
		SC.Img.sprites = new Image();
		SC.Img.sprites.src = '/assets/game/img/sprites.png';
		SC.Img.sprites.onload = func_onload();
	};
	
	// Pr�charger les Tiles
	// /!\Event : SC.Img.tiles_onload
	SC.Img.load_tiles = function (func_onload) {
		SC.Img.tiles = new Image();
		SC.Img.tiles.src = '/assets/game/img/tiles.png';
		SC.Img.tiles.onload = func_onload();
	};
	
})(SC);