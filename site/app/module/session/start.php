<?php 
	
	if(isset($_GET['new']))
	{
		//V�rifier que l'utilisateur dans $_GET['new'] a le droit de lancer un serveur
		//CODE
		
		//Cr�er une partie
		
		//Lancer le serveur
		//pclose(popen('start php -q .\app\module\session\game_server\new_server.php '.1, "r"));
		
		$context['no_render']=true;
	}