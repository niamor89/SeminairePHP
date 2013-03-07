<?php
$context["title"] = "Validate team";

if(isset($_POST['tour_payment']))
{
	$tour_payment_type=$_POST['tour_payment_type'];
}
if(isset($_POST['tour_validate_payment']))
{
header('Location: /tournament/start');
}
else
{
}

InsertTable('T_Equipe',array('id_Equipe'=>6, 'j1'=>1, 'j2'=>2, 'j3'=>3,'j4'=>4, 'j5'=>5, 'id_Chef'=>1));
InsertTable('T_Equipe',array('id_Equipe'=>6, 'j1'=>2, 'j2'=>3, 'j3'=>4,'j4'=>5, 'j5'=>6, 'id_Chef'=>1));
PDO_Err();

?>