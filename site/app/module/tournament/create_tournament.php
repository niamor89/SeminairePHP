<?php
$context["title"] = "Create Tour";
if(isset($_POST['tour_validate_info'])) {
	if(isset($_POST['tour_name']))
	{
		if(isset($_POST['tour_date']))
		{
			if(isset($_POST['tour_sum']))
			{
				InsertTable('T_Tournois',array('T_Etat_Tournois_id_Etat_Tournois'=>1, 'nom_Tournois'=>$_POST['tour_name'], 'date_Lancement'=>$_POST['tour_date'],'prix_Tournois'=>$_POST['tour_sum'], 'id_Createur'=>$_SESSION["id_user"])) or die("Erreur tournois non cr��") ;
				$tournois_id = mysql_query("select id_Tournois from T_Tournois where nom_Tournois = ".$_POST['tour_name']." and date_Lancement = ".$_POST['tour_date']." and id_Createur = ".$_SESSION["id_user"]) or die("Erreur id tournois") ;
				InsertTable('T_Inscription',array('T_Equipe_id_Equipe'=>1, 'T_Tournois_id_Tournois'=>$tournois_id, 'T_Etat_Inscription_id_Etat_Inscription'=>1, 'date_Inscription'=>date('l dS F Y - H:ia'))) or die("Erreur inscription non cr��") ;
				header('Location: /tournament/validate_team');
			} else {
				echo "Somme tournois non renseign�";
			}
		} else {
			echo "Date tournois non renseign�";
		}
	} else {
		echo "Nom tournois non renseign�";
	}
}
?>