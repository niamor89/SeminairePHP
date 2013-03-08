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
	
	/*SC.Can.Anim.sprites = new SC.Can.Anim.SpriteSheet({
			sprites: [
				{ name: 'top1' , x: 0 },
				{ name: 'top2', x: 1 },
				{ name: 'bot1', x: 2 },
				{ name: 'bot2', x: 3 },
				{ name: 'left1', x: 4 },
				{ name: 'left2', x: 5 },
				{ name: 'right1', x: 6 },
				{ name: 'right2', x: 7 },
				{ name: 'a', x: 8 },
				{ name: 'b', x: 9 },
				{ name: 'c', x: 10 },
				{ name: 'd', x: 11 },
			]
		});
	SC.Can.Anim.top = new SC.Can.Anim.Animation([
				{ sprite: 'top1', time: 0.8 },
				{ sprite: 'top2', time: 0.8 },
				{ sprite: 'bot1', time: 0.8 },
				{ sprite: 'bot2', time: 0.8 },
				{ sprite: 'left1', time: 0.8 },
				{ sprite: 'left2', time: 0.8 },
				{ sprite: 'right1', time: 0.8 },
				{ sprite: 'a', time: 0.8 },
				{ sprite: 'b', time: 0.8 },
				{ sprite: 'c', time: 0.8 },
				{ sprite: 'd', time: 0.8 },
				{ sprite: 'right2', time: 0.8 }
	], SC.Can.Anim.sprites);
	
	SC.Can.Anim.bot = new SC.Can.Anim.Animation([
				{ sprite: 'bot1', time: 0.2 },
				{ sprite: 'bot2', time: 0.4 },
				{ sprite: 'bot1', time: 0.2 },
				{ sprite: 'bot2', time: 0.4 }
	], SC.Can.Anim.sprites);
	
	SC.Can.Anim.left = new SC.Can.Anim.Animation([
				{ sprite: 'left1', time: 0.2 },
				{ sprite: 'left2', time: 0.4 },
				{ sprite: 'left1', time: 0.2 },
				{ sprite: 'left2', time: 0.4 }
	], SC.Can.Anim.sprites);
	
	SC.Can.Anim.right = new SC.Can.Anim.Animation([
				{ sprite: 'right1', time: 0.2 },
				{ sprite: 'right2', time: 0.4 },
				{ sprite: 'right1', time: 0.2 },
				{ sprite: 'right2', time: 0.4 }
	], SC.Can.Anim.sprites);*/
})(SC);