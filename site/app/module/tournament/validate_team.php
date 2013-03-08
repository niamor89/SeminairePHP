<?php
$context["title"] = "Validate team";

if(isset($_POST['tour_payment']))
{
	$tour_payment_type=$_POST['tour_payment_type'];
}
if(isset($_POST['tour_validate_payment']))
{
	//InsertTable('T_Tournois',array('T_Etat_Tournois_id_Etat_Tournois'=>1, 'nom_Tournois'=>$_POST['tour_name'], 'date_Lancement'=>$_POST['tour_date'],'prix_Tournois'=>$_POST['tour_sum'], 'id_Createur'=>$_SESSION["id_user"])) or die("Erreur tournois non crיי") ;
	UpdateTable('T_Inscription',array('code_Validation'=>'cD85hfPLo1'),'T_Etat_Inscription_id_Etat_Inscription'=>2);
	header('Location: /tournament/start');
}
else
{

}

/*InsertTable('T_Equipe',array('id_Equipe'=>6, 'j1'=>1, 'j2'=>2, 'j3'=>3,'j4'=>4, 'j5'=>5, 'id_Chef'=>1));
InsertTable('T_Equipe',array('id_Equipe'=>6, 'j1'=>2, 'j2'=>3, 'j3'=>4,'j4'=>5, 'j5'=>6, 'id_Chef'=>1));
PDO_Err();*/

?>