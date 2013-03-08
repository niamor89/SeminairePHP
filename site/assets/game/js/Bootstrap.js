// ADDEVENT CROSS-BROWSER
function addEvt(elemt,evt,func)
{
	if(elemt.attachEvent)
		elemt.attachEvent('on'+evt,func);
	else if(elemt.addEventListener)
		elemt.addEventListener(evt,func,false);
}

(function (window) {
	var SC = {}; // Namespace général
	window.SC = SC;
	
	//FPS
	SC.FPS = {}; // Namespace FPS
	SC.FPS.last_sec = new Date();
	SC.FPS.Count=0;			

	addEvt(window,'load',function () {
		//CANVAS
		SC.can = document.getElementById('session_canvas');
		SC.ctx = SC.can.getContext('2d');
		
		SC.Img.load_splash(function () {
			// INITIALISATION DU FRAME TIMER
			SC.Can.Anim.timer = new SC.Can.Anim.FrameTimer();
			SC.GL.next_step();
			//SC.GL.Game_Loop();
		});
		
		document.body.onkeydown = function (evt) {
			//alert(evt.keyCode);
			//MOVEMENTS
			if(evt.keyCode==37) SC.IO.ws.write(['MOV','LEFT']);
			if(evt.keyCode==39) SC.IO.ws.write(['MOV','RIGHT']);
			if(evt.keyCode==38) SC.IO.ws.write(['MOV','TOP']);
			if(evt.keyCode==40) SC.IO.ws.write(['MOV','BOTTOM']);
			
			//CRAFT
			//if(evt.keyCode==67) craft();
			//BUILD
			//if(evt.keyCode==66) build();
		};
	});
	
})(window);