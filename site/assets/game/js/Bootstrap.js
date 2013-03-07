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
			/*if(evt.keyCode==37) move(4);
			if(evt.keyCode==39) move(2);
			if(evt.keyCode==38) move(1);
			if(evt.keyCode==40) move(3);
			
			//CRAFT
			if(evt.keyCode==67) craft();
			//BUILD
			if(evt.keyCode==66) build();*/
		};
	});
	
})(window);