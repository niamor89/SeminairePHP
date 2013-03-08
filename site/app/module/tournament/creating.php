<?php
$context["title"] = "Create Tour";
if(isset($_POST['tour_validate_info'])) {
	if(isset($_POST['tour_name']))
	{
		if(isset($_POST['tour_date']))
		{
			if(isset($_POST['tour_sum']))
			{
				InsertTable('T_Tournois',array('id_Tournois'=>6, 'T_Etat_Tournois_id_Etat_'=>1, 'j2'=>2, 'j3'=>3,'j4'=>4, 'j5'=>5, 'id_Chef'=>1));
			} else {
				echo "Somme tournois non renseigné";
			}

		} else {
			echo "Date tournois non renseigné";
		}

	} else {
		echo "Nom tournois non renseigné";
	}


}

/*InsertTable('T_Equipe',array('id_Equipe'=>6, 'j1'=>1, 'j2'=>2, 'j3'=>3,'j4'=>4, 'j5'=>5, 'id_Chef'=>1));
InsertTable('T_Equipe',array('id_Equipe'=>6, 'j1'=>2, 'j2'=>3, 'j3'=>4,'j4'=>5, 'j5'=>6, 'id_Chef'=>1));
PDO_Err();*/

?>