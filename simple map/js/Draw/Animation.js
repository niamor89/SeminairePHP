(function (SC) {
	SC.Can.Anim = {}; // Namespace des animation
	
	// FRAME TIMER
	SC.Can.Anim.FrameTimer = function() {
    this._lastTick = (new Date()).getTime();
	};
	 
	SC.Can.Anim.FrameTimer.prototype = {
		getSeconds: function() {
			var seconds = this._frameSpacing / 1000;
			if(isNaN(seconds)) {
				return 0;
			}
			return seconds;
		},
	 
		tick: function() {
			var currentTick = (new Date()).getTime();
			this._frameSpacing = currentTick - this._lastTick;
			this._lastTick = currentTick;
		}
	};
	
	// SPRITE SHEET
	SC.Can.Anim.SpriteSheet = function(data) {
		this.load(data);
	};
	 
	SC.Can.Anim.SpriteSheet.prototype = {
		_sprites: [],
	 
		load: function(data) {
			this._sprites = data.sprites;
		},
	 
		getOffset: function(spriteName) {
			for(var i = 0, len = this._sprites.length; i < len; i++) {
				var sprite = this._sprites[i];
	 
				if(sprite.name == spriteName) {
					return i + (sprite.x||0);
				}
			}
			return null;
		}
	};
	
	// ANIMATION
	SC.Can.Anim.Animation = function(data, sprites) {
		this.load(data);
		this._sprites = sprites;
	};
	 
	SC.Can.Anim.Animation.prototype = {
		_frames: [],
		_frame: null,
		_frameDuration: 0,
	 
		load: function(data) {
			this._frames = data;
	 
			//Initialize the first frame
			this._frameIndex = 0;
			this._frameDuration = data[0].time;
		},
	 
		animate: function(deltaTime) {
			//Reduce time passed from the duration to show a frame        
			this._frameDuration -= deltaTime;
	 
			//When the display duration has passed
			if(this._frameDuration <= 0) {
				//Change to next frame, or the first if ran out of frames
				this._frameIndex++;
				if(this._frameIndex == this._frames.length) {
					this._frameIndex = 0;
				}
	 
				//Change duration to duration of new frame
				this._frameDuration = this._frames[this._frameIndex].time;
			}
		},
	 
		getSprite: function() {
			//Return the sprite for the current frame
			return this._sprites.getOffset(this._frames[this._frameIndex].sprite);
		}
	};
	
	SC.Can.Anim.sprites = new SC.Can.Anim.SpriteSheet({
			sprites: [
				{ name: 'lol' , x: 0 },
				{ name: 'lol1', x: 1 },
				{ name: 'lol2', x: 2 },
			]
		});
	SC.Can.Anim.walk = new SC.Can.Anim.Animation([
				{ sprite: 'lol', time: 0.2 },
				{ sprite: 'lol1', time: 0.4 },
				{ sprite: 'lol', time: 0.2 },
				{ sprite: 'lol2', time: 0.4 }
	], SC.Can.Anim.sprites);
})(SC);