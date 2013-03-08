<?php

$req = "SELECT id_tournament, nom_tournois, date_Lancement, id_Createur, prix_Tournois FROM T_Tournois WHERE T_Etat_Tournois_id_Etat_Tournois = 1";

$check = mysql_query($req) or die('could not get Tournaments');

$list = array();

While ($tourn = mysql_fetch_array($check)) {
	for ($i=0; $i<$tourn.count() ;$i++) {
		$list[$i][0] = $tourn[$i]->id_Tournois;
		$list[$i][1] = $tourn[$i]->nom_Tournois;
		$list[$i][2] = $tourn[$i]->date_Lancement;
		$list[$i][3] = $tourn[$i]->id_Createur;
		$list[$i][4] = $tourn[$i]->prix_Tournois;
	}
}

?>