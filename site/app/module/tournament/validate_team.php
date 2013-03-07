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

InsertTable('T_Equipe',array('id_Equipe'=>4, 'j1'=>1, 'j2'=>1, 'j3'=>1,'j4'=>1, 'j5'=>1, 'id_Chef'=>1));

PDO_Err();

?>