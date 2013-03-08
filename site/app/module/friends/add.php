<?php 

	$context["title"] = "Create Tour";
	if(isset($_POST['friends_research'])) {
		if($_POST['search'] != "") {
			$friend = GetRow('SELECT id_Joueur, pseudo_Joueur FROM t_joueur WHERE pseudo_Joueur = '.$_POST['search']) or die ('could not get friend');
		}
	}

?>
