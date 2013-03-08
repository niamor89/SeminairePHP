<div id="session_loading"><img src="/assets/img/loading.gif"/><br/>Loading ...</div>
<div id="session">
	<div id="session_start" class="button_wooden">
		Nouvelle partie/Rejoindre
	</div>
</div>
<script>
	var session_time_out = 15;
	var session_alive_launch;
	var session_nb = 1; //récupérer ici la partie du joueur
	
	function server_alive() {
		$.get('/session/check_servers&alive='+session_nb,function(data){
			//alert(data);
			var seconds = new Date(new Date() - session_alive_launch).getSeconds();				
			if(seconds<session_time_out)
				if(data==0)
					var t = setTimeout('server_alive();',3000);
				else
					document.location.href='/session/get_client&sess='+session_nb;
			else
				{ alert('Serveur injoignable'); document.location.href='/session/start'; }
		});
	}
	
	$('#session_start').click(function (){
		
		$.get('/session/check_servers&alive='+session_nb,function(data){
			if(data==0) $.get('/session/start&new='+session_nb,function(d){document.getElementById('session_loading').innerHTML=d;});
		});
		
		$('#session_loading').show();
		session_alive_launch = new Date();
		server_alive();
	});
</script>
