<?php 
	
	if(isset($_GET['new']))
	{
		//Vérifier que l'utilisateur dans $_GET['new'] a le droit de lancer un serveur
		//CODE
		
		//Créer une partie
		
		//Lancer le serveur
		function file_get_contents_utf8($fn) { 
			$opts = array( 
				'http' => array( 
					'method'=>"GET", 
					'header'=>"Content-Type: text/html; charset=utf-8" 
				) 
			); 

			$context = stream_context_create($opts); 
			$result = @file_get_contents($fn,false,$context); 
			return $result; 
		} 
		$alive = file_get_contents_utf8('http://'.$_SERVER['HTTP_HOST'].'/session/check_servers&alive='.$_GET['new']);
		echo $alive;
		if(!$alive) pclose(popen('start php -q '.__DIR__.'\..\..\game_server\new_server.php '.$_GET['new'], "r"));
		$context['no_render']=true;
	}