<div id="session_loading"><img src="/assets/img/loading.gif"/><br/>Loading ...</div>
<div id="session">
	<div id="session_start" class="button_wooden">
		Nouvelle partie/Rejoindre
	</div>
</div>
<script>
	var session_time_out = 5;
	var session_alive_launch = new Date();
	var session_nb = 1; //récupérer ici la partie du joueur
	
	function server_alive() {
		$.get('/session/start&alive='+session_nb,function(data){
			var seconds = new Date(new Date() - session_alive_launch).getSeconds();				
			if(seconds<session_time_out)
				if(!data)
					var t = setTimeout('server_alive();',1000);
				else
					document.location.href='/session/get_client&sess='+session_nb;
			else
				{ alert('Serveur injoignable'); document.location.href='/session/start'; }
		});
	}
	
	$('#session_start').click(function (){
		
		$.get('/session/start&new='+session_nb/*,function(d){document.getElementById('session_loading').innerHTML=d;}*/);
		$('#session_loading').show();
		server_alive();
	});
</script>
