<?php
	if(count($_GET)>1) $context['no_render']=true;
	if(!isset($_SESSION["id_user"]) || !isAdmin()) {
		header("Status: 303 See Other", false, 303);
		header('Location : /website/index');
		exit();
	}
	
	
	if(isset($_GET['liste_j'])) {
		echo json_encode(GetArray('SELECT * FROM t_joueur'));
	}
	else if(isset($_GET['liste_c'])) {
		echo json_encode(GetArray('SELECT * FROM t_carte'));
	}
	else if(isset($_GET['liste_s'])) {
		echo json_encode(GetArray('SELECT * FROM t_serveur'));
	}