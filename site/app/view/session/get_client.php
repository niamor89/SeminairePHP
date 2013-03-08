	<div id="session_loading"><img src="/assets/img/loading.gif"/><br/>Loading ...</div>
	
	<script src="/assets/game/js/Bootstrap.js"></script>
	<script src="/assets/game/js/Preloading/Images.js"></script>
	<script src="/assets/game/js/Data/data.js"></script>
	<script src="/assets/game/js/Game_Logic/Game_Logic.js"></script>
	<script src="/assets/game/js/Draw/Draw.js"></script>
	<script src="/assets/game/js/Draw/Animation.js"></script>
	<script src="/assets/game/js/IO/IO.js"></script>

	<div id="session"><canvas id="session_canvas" height = "550px" width = "800px"> </canvas><div id="session_debug"></div></div>
	<audio id="session_music" preload="preload" loop="loop"> 
	   <!--<source src="/assets/game/sounds/intro.mp3" type="audio/mp3" /> -->
	   <source src="/assets/game/sounds/mp3/main_theme_1.mp3" type="audio/mp3" /> 
	   <source src="/assets/game/sounds/intro.ogg" type="audio/ogg" /> 
	   Votre navigateur ne supporte pas le tag . 
	</audio> 
	<script>
		//$('#session_music').get()[0].volume=0.2; $('#session_music').get()[0].play();
		
		var session_time_out = 5;
		var session_alive_launch = new Date();
		var session_nb = 1; //récupérer ici la partie du joueur
		function server_alive() {
		$.get('/session/check_servers&alive='+session_nb,function(data){
			var seconds = new Date(new Date() - session_alive_launch).getSeconds();				
			if(seconds<session_time_out) {
				if(data==0)
					var t = setTimeout('server_alive();',1000);
			}
			else
				{ alert('Serveur injoignable'); document.location.href='/session/start'; }
		});
	}
	
	
	</script>

	

	